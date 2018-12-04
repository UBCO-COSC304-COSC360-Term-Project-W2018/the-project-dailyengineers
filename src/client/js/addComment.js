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
  replyBox.html($('#replyFieldTemplate').html());
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
  comment.html($('#commentTemplate').html());
  parent.append(comment);

  // make the ajax call
  var parentid;
  var depth;

  if (parent == $('#commentList')) {
    parentid = null;
    depth = 0;
  } else {
    parentid = Number(parent.commentID());
    depth = Number(parent.depth()) + 1;
  }
  $.post("../action/addComment.php", {
    title:    comment.children("h3"),
    content:  comment.children("p"),
    parentID: parentid,
    depth:    depth
  });
}
