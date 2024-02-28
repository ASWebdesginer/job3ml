//massage limit words
// const textarea = document.getElementById('message-in');
// const maxWords = 150;

// textarea.addEventListener('input', function() {
// 	const words = this.value.trim().split(/\s+|,/).length;
// 	if (words > maxWords) {
// 		this.setCustomValidity('Please limit your input to 150 words.');
// 	} else {
// 		this.setCustomValidity('');
// 	}
// });

jQuery(document).ready(function($) {
    var textarea = $('#message-in');
    var maxWords = 150;

    textarea.on('input', function() {
        var words = $.trim($(this).val()).split(/\s+|,|\.|:|\/|-|\/\//).length;
        if (words > maxWords) {
            this.setCustomValidity('Please limit your input to 150 words.');
        } else {
            this.setCustomValidity('');
        }
    });
	    jQuery("#page").load("content.html", function() {
			 // Hide loading div after another div finishes loading
			 setTimeout(function() {
				jQuery(".smart-page-loader").hide();
			},1500);
	    });
	
});

//attach documents
jQuery(document).ready(function(){
	jQuery(".attachBox").each(function(index) {

		var thisIndex = index;

	    jQuery(this).on("click touch", function(){

	        document.getElementsByClassName('attachClick')[index].click();

            jQuery(".attachBox:eq("+index+") .attachClick").on("change",function(){

            	var fileNameGet = getFileName(this.value);
		    	jQuery(".attachBox:eq("+index+") .caption").text(fileNameGet);
		    });

	    });
	});
	//renew  button ajax request

	jQuery("#renewpostmi").on("click",function(e){
		e.preventDefault();
		const data={
			'action': 'renewpost',
			'post_id': jQuery(this).attr('data-id'),
		};
		jQuery.ajax({
			type: 'POST',
			url:'/wp-admin/admin-ajax.php',
			data:data,
			success: function(response){
				alert(response);
			}
		})
	})

    var currenturl=window.location.href;
	var stringar="ar";
	if(currenturl.indexOf(stringar) !== -1){
	   jQuery("header").find(".desktop-view").find(".loginform").find("a.wplf-lostpassword").text("فقدت كلمة المرور الخاصة بك؟");
		 jQuery("header").find(".desktop-view").find(".loginform").find("a.wplf-lostpassword").show();
	}
    jQuery("a.dropdown-item.sharebtnmi6").on("click", function(e){
	e.preventDefault();
	navigator.clipboard.writeText(e.target.href);
	alert('linked copied!!');
	});

	const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
	const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

	jQuery(window).scroll(function() {
	    var scroll = jQuery(window).scrollTop();

	    //console.log(scroll);

	    if (scroll >= 300) {
	    	//jQuery(".desktop-view .navbar").switchClass( "fixed-none", "fixed-top", 1000, "fadeIn" );
	        jQuery(".desktop-view .navbar").addClass("fixed-top");
	    } else {
	    	//jQuery(".desktop-view .navbar").switchClass( "fixed-top", "fixed-none", 1000, "fadeOut" );
	        jQuery(".desktop-view .navbar").removeClass("fixed-top");

	    }
	});
 

	jQuery('.selectpicker').selectpicker();

	jQuery(".w-input-grp").on("click", function(){
		jQuery("#attachFile").trigger("click");
	});
	jQuery(".w-input-grp").on("click", function(){
		jQuery("#attachFile").trigger("click");
	});
	jQuery("#btn-attach").on("click", function(){
		jQuery("#attachFile").trigger("click");
	});

	jQuery("#age").slider({rtl:'auto'});
	jQuery("#exp").slider({rtl:'auto'});
	jQuery("#salary").slider({rtl:'auto'});

	jQuery('#country').on('changed.bs.select', function (e, clickedIndex, isSelected, previousValue) {
		
		
		var getValCountry = jQuery(this).val();
		var getLang = jQuery(this).attr("data-language");
		
		if(getValCountry != 0){
			jQuery("#city").removeAttr("disabled");
			jQuery("#city").selectpicker('refresh');

			ajaxSubmitCountry(getValCountry);
		}

	});

	//employer add post
	jQuery("#addNewJobPost").submit(function(e){

	    e.preventDefault();
	    ajaxSubmit('#addNewJobPost','addJobs');

	});

	//add more attachments
    jQuery(".addMore").on("click touch", function(){

        var element = jQuery('#multiAttach .attachedRow');
        var cloneLimit = 3;
        var numItems = element.length;
        var lastDiv = element.last();
        var clonedDiv = lastDiv.clone();

        if(numItems >= cloneLimit){
        	jQuery(".exceededCont").removeClass("hideThis");
        	jQuery(".addMoreCont").hide();
        }else{
        	jQuery(".addMoreCont").show();
        	jQuery(".exceededCont").addClass("hideThis");
			jQuery("#multiAttach").append(clonedDiv);
			clonedDiv.find('.hideThisLabel').removeClass('hideThisLabel');
			clonedDiv.find('.attachClick').val('');
        }


        jQuery(".deleteAttachment").each(function(){

            jQuery(this).on("click touch", function(){

    	        if(numItems < cloneLimit){
		        	jQuery(".addMoreCont").show();
		        	jQuery(".exceededCont").addClass("hideThis");
		        }

                var getParent = jQuery(this).parent().parent().parent().parent();
   				getParent.remove();



            });

        });

        clickAttached();

    });

	//add  logo
	jQuery(".attachboxLogo").on("click touch", function(){

		document.getElementById('attachClickLogo').click();

	    jQuery(".attachboxLogo #attachClickLogo").on("change",function(){

	    	var fileNameGetLogo = getFileName(jQuery("#attachClickLogo").val());
			jQuery(".attachboxLogo .caption").text(fileNameGetLogo);
	    });


	});

	//pricing transfer post
	jQuery("#premiumPayment").submit(function(e){

	    e.preventDefault();
	    ajaxSubmitPayment('#premiumPayment','transferPayment');

	});

	//commission transfer post
	jQuery("#commissionPayment").submit(function(e){

			e.preventDefault();

			//console.log("reach submit function");
			ajaxSubmitPayment('#commissionPayment','transferPayment');

	});

	//commission adsid verification
	jQuery("#verifyId").submit(function(e){

		e.preventDefault();
		ajaxSubmitVerify('#verifyId','verifyId');

	});

    //update post ad
    jQuery("#addThisad").on("click touch",function(e){
		e.preventDefault();
		var getPostId = jQuery(this).attr("data-id");
		var getPostSubs = jQuery(this).attr("data-subs");

		ajaxUpdatePost(getPostId,getPostSubs,'updateSubs');

		//console.log(getPostId);
		//console.log(getPostSubs);
   });
  
	//service add post 
	jQuery("#addNewServicePost").submit(function(e){

	    e.preventDefault();
	    ajaxSubmit('#addNewServicePost','addService');

	});

	//resume add post 
	jQuery("#addNewResumePost").submit(function(e){

	    e.preventDefault();
  ajaxSubmit('#addNewResumePost','addResume');
	});
	
//resume edit post 
jQuery("#editResumePost").submit(function(e){

    e.preventDefault();

    var postId = getParameterByName('id'); // Get post ID from URL parameter or wherever it's available
ajaxupdate('#editResumePost', 'updateResume', postId);
});

//employer edit
jQuery("#editJobPost").submit(function(e){

    e.preventDefault();

    var postId = getParameterByName('id'); // Get post ID from URL parameter or wherever it's available
ajaxupdate('#editJobPost', 'updateEmployer', postId);
});

//service edit
jQuery("#editServicePost").submit(function(e){

    e.preventDefault();

    var postId = getParameterByName('id'); // Get post ID from URL parameter or wherever it's available
ajaxupdate('#editServicePost', 'updateService', postId);
});
// 	jQuery("#apply").on("click touch", function(e){
		
// 		e.preventDefault();
// 		var getPostId = jQuery(this).attr("data-id");
// 		var getUserId = jQuery(this).attr("data-user");
// 	    ajaxApply(getPostId,getUserId);
		
// 	});
	
	jQuery(".pagination .page-item .page-numbers").each(function(){
		jQuery(this).addClass(" page-link");
	})
	
	//resume add post 
	jQuery("#guestApply").submit(function(e){

	    e.preventDefault();
	    ajaxSubmitGuestApply('#guestApply','guestApply');

	});
	
	//delete post
	jQuery("#deletePost").on("click touch", function(e){
		
		e.preventDefault();
		var getPostId = jQuery(this).attr("data-id");
	    ajaxDelete(getPostId);
		
	});
	
	//search form 
	jQuery("#searchForm").submit(function(e){
		
		e.preventDefault();
		var url = window.location.href;
		var urlWithoutParameters = url.substring(0, url.indexOf("?"));
		var searchPost = jQuery(this).serialize();
		//console.log(searchPost);
		window.location.replace(urlWithoutParameters+"?"+searchPost);
		//ajaxSubmitSearch('#searchForm','searchPost');
		
	});
	
	jQuery('#fromSalary').on('keyup',function(){
		var value = jQuery(this).val();
		
			console.log(value);
		
		jQuery('#toSalary').attr("min",value);
	});

	jQuery('#js_confirm_password').on('keyup', function () {
			var password = jQuery('#js_password').val();
			var confirmPassword = jQuery(this).val();

			if (password === confirmPassword) {
				jQuery('#passmsg').html('Passwords match').css('color', 'green');
				// jQuery('#passmsg_ar').html('كلمات السر متطابقة').css('color', 'green');
			} else {
				jQuery('#passmsg').html('Passwords do not match').css('color', 'red');
				// jQuery('#passmsg_ar').html('كلمة المرور غير مطابقة').css('color', 'red');
			}
	});
});


// //functions
// function clickAttached(){

// 	jQuery(".attachBox").each(function(index) {

// 		var thisIndex = index;

// 	    jQuery(this).on("click touch", function(){

// 	        document.getElementsByClassName('attachClick')[thisIndex].click();

//             jQuery(".attachBox:eq("+index+") .attachClick").on("change",function(){

//             	var fileNameGet = getFileName(this.value);
// 		    	jQuery(".attachBox:eq("+index+") .caption").text(fileNameGet);
// 		    });

// 	    });
// 	});
// }
// //functions
function clickAttached() {
    jQuery(".attachBox").each(function(index) {
        var thisIndex = index;
        // Unbind previous event listeners
        jQuery(this).off("click touch").on("click touch", function() {
            document.getElementsByClassName('attachClick')[thisIndex].click();
            jQuery(".attachBox:eq("+index+") .attachClick").off("change").on("change", function() {
                var fileNameGet = getFileName(this.value);
                jQuery(".attachBox:eq("+index+") .caption").text(fileNameGet);
            });
        });
    });
}



function getFileName(path) {
    return path.replace(/\\/g,'/').replace( /.*\//, '' );
}
	    // jQuery(this).on("click touch", function(){
        //     const index=path;
	    //     document.getElementsByClassName('attachClick')[index].click();

        //     jQuery(".attachBox:eq("+index+") .attachClick").on("change",function(){

        //     	var fileNameGet = getFileName(this.value);
		//     	jQuery(".attachBox:eq("+index+") .caption").text(fileNameGet);
		//     });

	    // })
function ajaxSubmit(getData,getAction) {

    //console.log("ajax submitted");

    var newPostAdd = jQuery(getData).serialize();
	var fileAttach = [];
jQuery('input[name="imgMulti[]"]').each(function() {
    console.log("Selected file:", jQuery(this).prop('files')[0]);
    fileAttach.push(jQuery(this).prop('files')[0]);
});

	var filesLogo  = jQuery("#attachClickLogo").prop('files')[0];
	
	if(jQuery("#cvAttach").length) {
	  var filesCv  = jQuery("#cvAttach").prop('files')[0];
	}


	//console.log(newPostAdd);
	//console.log(fileAttach);
	//console.log(filesLogo);
	//console.log(filesCv);


	var fd = new FormData();
	fd.append("action", getAction);
	fd.append("fileAttach", fileAttach);
	for (var i = 0; i < fileAttach.length; i++) {
	  fd.append('fileAttach[]', fileAttach[i]);
	}
	fd.append("fileLogo", filesLogo);
	
	if(jQuery("#cvAttach").length) {
	  fd.append("filesCv", filesCv);
	}	
	
	fd.append("data", newPostAdd);
// Add similar statements for other variables
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
		processData: false,
		contentType: false,
        data: fd,
        success: function(data){
            //jQuery("#feedback").html(data);
			const urlPattern = /(https?|ftp):\/\/[^\s/$.?#].[^\s]*/gi;
			const urls = data.match(urlPattern);
			if (urls && urls.length > 0) {
				window.location.replace(urls[0]);
			}
            // location.replace(data);
        }, error: function(xhr, status, error) {
        console.error("AJAX Error: " + status + " - " + error);
    }
    });

}

// get id 
function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function ajaxupdate(getData, getAction, postId) {
    var newPostAdd = jQuery(getData).serialize();
    var fileAttach = [];
    jQuery('input[name="imgMulti[]"]').each(function() {
        console.log("Selected file:", jQuery(this).prop('files')[0]);
        fileAttach.push(jQuery(this).prop('files')[0]);
    });

    var filesLogo = jQuery("#attachClickLogo").prop('files')[0];

    if (jQuery("#cvAttach").length) {
        var filesCv = jQuery("#cvAttach").prop('files')[0];
    }

    var fd = new FormData();

    fd.append("action", getAction);
    fd.append("fileAttach", fileAttach);
    for (var i = 0; i < fileAttach.length; i++) {
        fd.append('fileAttach[]', fileAttach[i]);
    }
    fd.append("fileLogo", filesLogo);

    if (jQuery("#cvAttach").length) {
        fd.append("filesCv", filesCv);
    }

    fd.append("data", newPostAdd);
    fd.append("id", postId); // Add ID to FormData
	console.log(fd);
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        processData: false,
        contentType: false,
        data: fd,
        success: function(data) {
            // Handle success response here
            // You can parse the response data and handle accordingly
            //console.log(data);
             window.location.replace(data); // Redirect or handle response as needed
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: " + status + " - " + error);
            // Handle error response here
        }
    });
}


function fileajaxSubmit(getData, getAction) {
 
}


function ajaxSubmitPayment(getData,getAction) {

    //console.log("ajax submitted");

		//console.log("reach ajax");

	var newPostAdd = jQuery(getData).serialize();
	var fileAttach = [];
	jQuery('input[name="imgMulti[]"]').each( function() {
    	fileAttach.push(jQuery(this).prop('files')[0]);
	});

	//console.log(newPostAdd);
	//console.log(fileAttach);


	var fd = new FormData();
	fd.append("action", getAction);
	fd.append("fileAttach", fileAttach);
	for (var i = 0; i < fileAttach.length; i++) {
	  fd.append('fileAttach[]', fileAttach[i]);
	}
	fd.append("data", newPostAdd);

    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
		processData: false,
		contentType: false,
        data: fd,
        success: function(data){

            //var obj = jQuery.parseJSON(data);

						//console.log(obj);

						// if(obj['result'] == 1){
						// 	console.log("database updated");
						// }else{
						// 	console.log("database not updated");
						// }
             console.log(data);
            triggerModal("thankyou-modal");
        }
    });

}

function ajaxSubmitCountry(countryId){
	
	console.log(countryId);

    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {
		    action: "getCities",
		    dataId: countryId,
		},
        success: function(data){
        	console.log(data);
			jQuery('#city').empty().append(data);
			jQuery("#city").selectpicker('refresh');
        }
    });

 }

function triggerModal(modalId){

	var myModal = new bootstrap.Modal(document.getElementById(modalId));
	myModal.show();

}

function ajaxSubmitVerify(getData,getAction){

	var newPostAdd = jQuery(getData).serialize();

	var fd = new FormData();
	fd.append("action", getAction);
	fd.append("data", newPostAdd);


    jQuery.ajax({
        type: "POST",
				url: "/wp-admin/admin-ajax.php",
				processData: false,
				contentType: false,
				data: fd,
				success: function(data){

					var obj = jQuery.parseJSON(data);

					if(obj['status'] == 0){
						jQuery("#alert-verify").html(obj['message']);
					}else{
						jQuery("#adsId").val(obj['adId']);
						jQuery("#postId").val(obj['id']);
						jQuery("#postIdCard").text(obj['id']);
						jQuery("#alert-verify").html(obj['message']);
						jQuery("#payment").removeClass("hideThis");
						jQuery("#confirmed-adsid").text(obj['adId']);

						var percent = jQuery('#reqCom').val();
						getPayment(percent+"00");
					}

				}
    });

}

function ajaxUpdatePost(getPostId,getPostSubs,getAction){
	

  //var newPostAdd = jQuery(getData).serialize();

  var fd = new FormData();
  fd.append("action", getAction);
  fd.append("dataid", getPostId);
  fd.append("datasubs", getPostSubs);

    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        processData: false,
        contentType: false,
        data: fd,
        success: function(data){

          var obj = jQuery.parseJSON(data);
          console.log(obj);

          if(obj['status'] == 1){
            triggerModal("thankyou-modal");
          }

        }
    });
}

function ajaxApply(postId,userId){
	
	//console.log(postId);
	//console.log(userId);
	
	var fd = new FormData();
	fd.append("action", "transacThis");
	fd.append("postId", postId);
	fd.append("userId", userId);
	
	jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
		processData: false,
		contentType: false,
        data: fd,
        success: function(data){

            var obj = jQuery.parseJSON(data);

						console.log(obj);

						// if(obj['result'] == 1){
						// 	console.log("database updated");
						// }else{
						// 	console.log("database not updated");
						// }

            //triggerModal("thankyou-modal");
        }
    });
	
}

function ajaxSubmitGuestApply(getData, getAction) {
    var newPostAdd = jQuery(getData).serialize();
    var fileAttach = [];

    jQuery('input[name="imgMulti[]"]').each(function() {
        console.log("Selected file:", jQuery(this).prop('files')[0]);
        fileAttach.push(jQuery(this).prop('files')[0]);
    });

    var filesLogo = null; // Initialize to null

    if (jQuery("#attachClickLogo").length) {
        var logoInput = jQuery("#attachClickLogo");
        if (logoInput[0].files.length > 0) {
            filesLogo = logoInput.prop('files')[0];
        }
    }    var filesCv = null; // Initialize to null

    if (jQuery("#cvAttach").length) {
        var cvInput = jQuery("#cvAttach");
        if (cvInput[0].files.length > 0) {
            filesCv = cvInput.prop('files')[0];
        }
    }

    var fd = new FormData();
    fd.append("action", getAction);

    // Append each file individually
    for (var i = 0; i < fileAttach.length; i++) {
        fd.append('fileAttach[]', fileAttach[i]);
    }

    fd.append("fileLogo", filesLogo);

    if (filesCv !== null) {
        fd.append("filesCv", filesCv);
    }

    fd.append("data", newPostAdd);

    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        processData: false,
        contentType: false,
        data: fd,
        success: function(data) {
		   var	data = JSON.parse(data);
            jQuery("#thankyou-modal").find(".modal-body").html(`<p class='text-bluemi text-center'>${data.successmessage}</p>`);
	        setTimeout(function() { location.reload();
			},2000);
        },
        error: function(xhr, status, error) {
            console.error("AJAX Error: " + status + " - " + error);
        }
    });
}


function ajaxDelete($postId){
	
	var fd = new FormData();
	fd.append("action", "deletePost");
	fd.append("data", $postId);

    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
		processData: false,
		contentType: false,
        data: fd,
        success: function(data){
            //jQuery("#feedback").html(data);
            //console.log(data);
            window.location.replace(data);
        }
    });
	
}

/*
function ajaxSubmitSearch(getData,getAction){
	
	var searchPost = jQuery(getData).serialize();
	console.log(searchPost);
	
	var fd = new FormData();
	fd.append("action", getAction);
	fd.append("data", searchPost);
	
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
		processData: false,
		contentType: false,
        data: fd,
        success: function(data){

            
		console.log("data");
	
        }
    });	
	
}
*/