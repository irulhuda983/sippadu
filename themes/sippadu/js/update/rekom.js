// $(document).ready(function() {

//     $('.kirim-rekom').on('click', function(e){
//         e.preventDefault();
//         let url =$(this).attr('href')
//         let id = $(this).data('id')
//         console.log(id)
//         let options = {
//             placement: 'right',
//             title: 'Tidak Boleh Kosong'
//         }

//         let no_rekom = $('input[name="no_rekom"]').val().length;
//         let tgl_rekom = $('input[name="tgl_rekom"]').val().length;
//         let perihal_rekom = $('input[name="perihal_rekom"]').val().length;
        			
// 		if (no_rekom == 0) {				
// 			$('input[name="no_rekom"]').addClass('invalid')
//             $('input[name="no_rekom"]').focus()
//             $('[data-toggle="popover"]').popover()
// 			return false;
//         }else{
//             $('input[name="no_rekom"]').removeClass('invalid')
//             // return false;
//         }
        
//         if (tgl_rekom == 0) {				
// 			$('input[name="tgl_rekom"]').addClass('invalid')
// 			$('input[name="tgl_rekom"]').focus
// 			return false;
//         }else{
//             $('input[name="tgl_rekom"]').removeClass('invalid')
//         }
        
//         if (perihal_rekom == 0) {				
// 			$('input[name="perihal_rekom"]').addClass('invalid')
//             $('input[name="perihal_rekom"]').focus()
//             $('input[name="perihal_rekom"]').tooltip(options)
// 			return false;
//         }else{
//             $('input[name="perihal_rekom"]').removeClass('invalid')
//         }
        

//         $.ajax({
//             url: url,
//             method: 'POST',
//             data: {
//                 id: id,
//                 no_rekom: $('input[name="no_rekom"]').val(),
//                 tgl_rekom: $('input[name="tgl_rekom"]').val(),
//                 perihal_rekom: $('input[name="perihal_rekom"]').val()
//             },
//             success: (data) => {
//                 console.log(data)
//             }
//         })
//     });
// })