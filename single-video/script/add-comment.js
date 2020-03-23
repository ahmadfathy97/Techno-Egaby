$('#add-comment').on('click', addComment);
var urlParams = new URLSearchParams(window.location.search);
var video_id = urlParams.get('id');
function addComment() {
  let err = validation();
  console.log(err);
  if(err){
    $('.err-container').html(`<div class="alert alert-danger" id="err">${err}</div>`);
  } else{
    $('.err-container').empty();
    var data = {
      name: $('#comment-owner').val(),
      comment: $('#comment-body').val(),
      id_video: video_id
    };
    $.ajax('/single-video/add-comment/',{
      method: 'POST',
      data: data,
      success(comments){
        $('#comment-owner').val('');
        $('#comment-body').val('');
        $('.comments').html('');
        var commentsParsed = JSON.parse(comments)
        commentsParsed.forEach((comment, index)=>{
          $('.comments').append(
            `
            <li class="p-2 rounded m-1">
              <h3> ${comment.name} </h3>
              <p> ${comment.comment} </p>
            </li>
            `
          )
        });
        $('.comments').animate({ scrollTop: $('#comments').prop('scrollHeight') }, 10);
      },
      error(err){
        console.log(err);
      }
    })
  }
};

function validation(){
  if(
    $('#comment-owner').val().trim().length < 3 ||
    $('#comment-body').val().trim().length < 3
  ){
    return 'يجب عليك ملء جميع الحقول من(3-50) حرف فقط';
  } else{
    return false;
  }
};
