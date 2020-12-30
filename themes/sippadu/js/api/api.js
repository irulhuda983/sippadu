$(window).load(function() {
    let nokitas = $('#nokitas')
    let nama = $('#nama')
    let tempatLahir = $('#tempat_lahir')
    let tanggalLahir = $('#tanggal_lahir')
    let gender = $('input[name=gender]')
    let alamat = $('#alamat')

    $('#form-cek-nik').on('submit', async function (e){
        e.preventDefault()
        let nik = $('#cek_nik').val()

        let response = await ajaxDukcapil(nik)
        let data = response[0]

        let cek_data = data.RESPONSE_CODE

        if(cek_data != undefined){
            alert(data.RESPONSE_DESC)
        }else {
            console.log(data)
            let dataGender = ''
            const dataTgl = data.TGL_LHR
            let tgl = dataTgl.split('-')

            nokitas.val(data.NIK)
            nama.val(data.NAMA_LGKP)
            tempatLahir.val(data.TMPT_LHR)
            tanggalLahir.val(data.TGL_LHR)
            

            if(data.JENIS_KLMIN == 'Laki-Laki'){
                $('input:radio[name="gender"]').filter('[value="01"]').attr('checked', true)
            }else if(data.JENIS_KLMIN == 'Perempuan'){
                $('input:radio[name="gender"]').filter('[value="01"]').attr('checked', true)
            }

            gender.val(dataGender)
            alamat.val(data.ALAMAT)
            alamat.html(data.ALAMAT)
        }
    })


    function ajaxDukcapil(nik)
    {
        // 3522210107870003
        let myHeaders = new Headers();
        myHeaders.append("Content-Type", "application/json");

        let raw = JSON.stringify({"nik":nik,"user_id":"258201906202dwi","password":"123456","ip_user":"10.35.22.200"});

        let requestOptions = {
            method: 'POST',
            headers: myHeaders,
            body: raw,
            redirect: 'follow'
        };

        return fetch("http://172.16.160.43:8080/dukcapil/get_json/35-22/101_ijin/call_nik", requestOptions)
        .then(response => response.json())
        .then(result => result.content)
        .catch(error => console.log('error', error));

    }

})