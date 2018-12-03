var commentSubmit = $('#commentSubmit');

commentSubmit.onclick = function() { postComment(null); };

function addFields(parent) {
  // if there's another reply box open, get rid of it
  var previousReplyBox = $('#newReplyBox');
  if (previousReplyBox != null) {
    previousReplyBox.remove();
  }

  // create new reply fields
  var replyBox = document.createElement('div');
  replyBox.innerHTML = $('#replyFieldTemplate').innerHTML;
  replyBox.id = 'newReplyBox';
  parent.append(replyBox);

  $('#replySubmit').onclick = function() { postComment(parent); };
}

function postComment(parent) {
  // if the parent is null, assume this isn't a reply to anything
  if (parent == null) {
    parent = $('#commentList');
  }

  // create the comment
  var comment = document.createElement('li');
  comment.innerHTML = $('#commentTemplate').innerHTML;

  // make the ajax call
}
