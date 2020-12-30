$(document).ready(function() {
    // cae93f1a3d61d32e735f37b062d23b24
    // 8977b182f811b9eddd6f72c26f2be24d
    $('.btn-menu').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu').removeClass('active');
        $(this).addClass('active')

        let id = $(this).data('id')
        let url = $(this).data('url')

        let data = await getData(url, id)
        $('#kotak-data').html(data)

    })

    $('.btn-menu-bo').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu-bo').removeClass('active');
        $(this).addClass('active')

        let id = $(this).data('id')
        let url = $(this).data('url')

        let data = await getDataBo(url, id)
        $('#kotak-data-bo').html(data)

    })

    $('.btn-menu-kabid').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu-kabid').removeClass('active');
        $(this).addClass('active')

        let id = $(this).data('id')
        let url = $(this).data('url')

        let data = await getData(url, id)
        $('#kotak-data-kabid').html(data)

    })

    $('.btn-menu-kadin').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu-kadin').removeClass('active');
        $(this).addClass('active')

        let id = $(this).data('id')
        let url = $(this).data('url')

        let data = await getData(url, id)
        $('#kotak-data-kadin').html(data)

    })

    $('.btn-menu-tu').on('click', async function(e){
        e.preventDefault()
        $('.btn-menu-tu').removeClass('active');
        $(this).addClass('active')

        let id = $(this).data('id')
        let url = $(this).data('url')

        let data = await getData(url, id)
        $('#kotak-data-tu').html(data)

    })


    function getData(url, id)
    {
        return $.ajax({
            url: url +'/'+id,
            method: 'GET',
            success: (res) => {res}
        })
    }

    function getDataBo(url, id)
    {
        return $.ajax({
            url: url +'/'+id,
            method: 'GET',
            success: (res) => {res}
        })
    }

    function tableKosong()
    {
        return `<div class="table-responsive">
            <table  class="table table-hover" id="" style="font-size:12px;">
                <thead>
                    <tr class="active">
                        <th width="60px">No</th>
                        <th width="">Nama Usaha</th>
                        <th width="">Nama Personal</th>
                        <th width="">Tanggal</th>
                        <th width="20px">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <td colspan="5">Tidak Ada Izin Ditemukan</td>
                </tbody>
            </table>
        </div>`;
    }


})