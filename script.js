$(document).ready(function ()  {

  $('#trigger').on('click', function ()  {
    $('#trigger').prop('disabled', true);

    var timestamp = $.now();

    $.ajax({
      type: "GET",
      url: "content.php",
      dataType: "html",
      data: {'time': timestamp}
    })

    .done(function(data, textStatus, jqXHR)  {
      $('.output .msg').remove();
      $('.output').append(data);
      $('#trigger').prop('disabled', false);
    })

    .fail(function(data, textStatus, jqXHR)  {
    });


  });

});
