$(window).load(function(){

    $('.btn-esign').on('click', async function(e) {
        e.preventDefault();
        let url = $(this).data('url')
        let id = $(this).data('id')

        let data = await getData()

        console.log(data)
    })


    function getData()
    {
      var myHeaders = new Headers();
      myHeaders.append("Authorization", "Basic ZXNpZ246cXdlcnR5");
      
      var formdata = new FormData();
      formdata.append("file", "/Users/andreyantopratama/Sample PDF/[3] Letter/LetterWithTag3.pdf");
      formdata.append("imageTTD", "/Users/andreyantopratama/Data_Registrasi/Tanda_Tangan.png");
      formdata.append("nik", "30122019");
      formdata.append("passphrase", "#4321qwer*");
      formdata.append("tampilan", "visible");
      formdata.append("page", "1");
      formdata.append("image", "true");
      formdata.append("width", "200");
      formdata.append("height", "100");
      formdata.append("tag_koordinat", "#");
      
      var requestOptions = {
        method: 'POST',
        headers: myHeaders,
        body: formdata,
        redirect: 'follow'
      };
      
      return fetch("http://103.87.16.111/api/sign/pdf", requestOptions)
        .then(response => response.text())
        .then(result => console.log(result))
        .catch(error => console.log('error', error));
    }
})