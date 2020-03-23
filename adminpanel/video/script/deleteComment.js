$('.delete-comment').on('click', function(){
  var that = $(this);
  $.ajax(`?delComm&id=${$(this).data('id')}&idComm=${$(this).data('idcomm')}`,{
    method: 'GET',
    success(){
      that.parent().remove();
    },
    error(err){
      console.log(err);
    }
  })
});
