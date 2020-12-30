$(document).ready(function() {

    $('.btn-menu-arsip').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu-arsip').removeClass('active');
        $(this).addClass('active')
    
        let id = $(this).data('id')
        let url = $(this).data('url')
    
        let result = await getData(url, id);
        let table = ""
        console.log(result)
        if(result.status == 0){
            table += `<tr>
                <td colspan="6">Tidak ada data di temukan</td>
            </tr>`;
        }else {
            data = result.rekom
            data.forEach((r) => {
                table += getTable(r);
              });
        }
        $('#kotak-data-arsip').html(`<table  class="table table-hover" id="" style="font-size:12px;">
                <thead>
                    <tr class="active">
                        <th width="">No. Registrasi</th>
                        <th width="">Nama Pemohon</th>
                        <th width="20px"></th>
                    </tr>
                </thead>
                <tbody>
                    ${table}
                </tbody>
            </table>`)
    
    })
    
    
    function getData(url, id)
    {
        return $.ajax({
            url: url +'/'+id,
            method: 'GET',
            dataType: 'json',
            success: (res) => {res}
        })
    }

    function getTable(r)
    {
        return `<tr> 
        <td>${r.no_reg}</td>
        <td>${r.NM_PELANGGAN}</td>
        <td align="center">
            <a href="dinkes/downloadSk/${r.nama_table}/${r.izin_id}" class="label bg-primary cetak-rekom">
                Download
            </a>
        </td>	
    </tr>`;
    }

    // end load
})

