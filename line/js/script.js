$(document).ready(function() {
  // Switches Login and Create form
  // $('.form_switch').click(function(){
  //   $('.flip_front').toggleClass('hide');
  //   $('.flip_back').toggleClass('hide');
  // });

  // Forgot password
  $('.forgotten_password').click(function(){
    alert("Your password has not been reset!");
  });

  setTimeout(function() {
      $('#actionMsg').hide('slow');
  }, 5000);

  // Scroll to top
  $('#scrollToTop').click(function(){
    $("html, body").animate({ scrollTop: 0 }, "slow");
    return false;
  });

  // Profile dropdown control
  $('#openDrop').click(function(){
    // e.preventDefault();
    $('.pa_dropdown').toggleClass('is_open');
  });

  // Post Controls
  $('.postbtn').click(function(e){
    e.preventDefault();
    var btnId = $(this).attr('id');
    var targetId = btnId + '_panel';

    $('#'+targetId).toggleClass('is_open');
  });

  // Hide post
  $('.hide_post').click(function(){
    var id = $(this).attr('id');
    var newId = id.split("_");
    var targetId = '#post_' + newId[1];

    $(targetId).hide('slow');
  });

  // Delete post
  $(".delete").click(function(e){
      if(!confirm('Are you sure?')){
          e.preventDefault();
          return false;
      }
      return true;
  });

  // Hide items on HTML
  $('html').click(function(e) {
    var a = e.target;

    // Hide post controls
    if ($(a).parents('.post_ctrl').length === 0) {
      $('.post_dropdown_ctrl').removeClass('is_open');
    }

    // Hide profile dropdown controls
    if ($(a).parents('#profileAction').length === 0) {
      $('.pa_dropdown').removeClass('is_open');
    }
  });

  // MODAL POPUP
  $('#createPost').click(function(){
    $('body').addClass('modal_open');
  });

  $('.modal_closer').click(function(){
    $('body').removeClass('modal_open');
  });

  // AJAX TEST
  $('#timeline').click(function(){
    var page = '/admin/timeline.html';
    $('#centerPage').load(page);
    return false;
    // $.ajax({
    //     type: "GET",
    //     url: "/admin/timeline.html",
    //     success: function(result){
    //         $('#centerPage').html(result);
    //     }
    // });
  });

  // $('#home').click(function(){
  //   window.location.href = '/admin/index.html';
  //   return false;
  // });

});

/* ------------------------------------------------------------- */
/* ------------------------- ON SCROLL ------------------------- */
/* ------------------------------------------------------------- */
$(document).on("scroll", function() {
  // Second navigation small
  if($(document).scrollTop()>300) {
    $("#profileControl").addClass("small");
  } else {
    $("#profileControl").removeClass("small");
  }

  // Show scrollToTop
  if($(document).scrollTop()>1000) {
    $("#scrollToTop").show("slow");
  } else {
    $("#scrollToTop").hide("slow");
  }
});