// $(document).ready(function () {

//     $("#btn_login").on('click', function (e) {


//         e.preventDefault();


//         if ($("#email").val() === null || $("#email").val().length < 2) {
//             alert("Preencha o EMAIL!");

//         } else {

//             if ($("#password").val() === null || $("#password").val().length < 2) {
//                 alert("Preencha a SENHA!");
//             } else {

//                 $.ajax({


//                     method: "POST",
//                     url: "../php/login_adm.php",
//                     datatype: "HTML",
//                     data: {
//                         metodo: "cad_adm",
//                         email: $("#email").val(),
//                         senha: $("#password").val(),

//                     }

//                 }).done(function (data) {

//                     console.log(data);
//                     if (data !== 'False') {
//                         alert("Erro: " + data)
//                     } else {
//                         window.location.href = '../adm/index.php';
//                     }
//                 })
//             }

//         }
//     }

//     )
// })
