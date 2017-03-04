/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function() {
    $("#searchbox").on('keyup', function() {
    var key = $(this).val();
        $.ajax({
            url : 'fetch.php',
            type : 'GET',
            data : 'keyword='+key,
            beforeSend : function() {
                $("#results").slideUp(500);
            },
            success : function(data) {
                $("#results").html(data);
                $("#results").slideDown(500);
            },
            error : function() {
                $("#results").slideUp(500); 
            }
        });
    });
});


