$(document).ready(function(){

    // video popup
	$('.video-link').magnificPopup({
	  type: 'iframe',
	  // other options
	});

	// content popup
	$('.popup-link').magnificPopup({
	  type: 'inline'
	  // other options
	});


	/* Form Validation */
	$('form').each(function () {
		console.log()
		var form = $(this); 
		if(form.length){
			form.validate({
				rules: {
		            phone: {
		                required: true,
		                number:true,
		                maxlength: 10,
		                minlength: 10
		            },
		            email: {
		                required: true,
		                email: true
		            }
		        },
		       submitHandler: function(form) {
		       		console.log(form.id);
		       		var btn = $('#'+form.id+' [type="submit"]'), _form = $(form), loading = _form.find('.loading');
		       		loading.fadeIn(), btn.attr('disabled', ''), _form.addClass('disabled')
			       	$.ajax({
			            url: form.action,
			            type: form.method,
			            data: $(form).serialize(),
			            success: function(data) {
			            	loading.fadeOut(), btn.removeAttr('disabled'), _form.removeClass('disabled')
			            	if(data) {
							    try {
			            			data = jQuery.parseJSON(data);
							    } catch(e) {
							        console.log(e) // error in the above string (in this case, yes)!
							    }
							}
			            	response = data.response;
			                console.log(data);
			            	if(response.code == 0)
						       	ohSnap('Failed sending your informations, please try again!', {color: 'red'});
						    else if(response.code == 1){
						    	form.reset()
						    	ohSnap('Your information successfully reached us.', {color: 'green', 'duration':'3000'}); // 
						    	setTimeout(function(){
							    	window.location = '../thankyou';
						    	},3000);
						    }
						    else if(response.code == 2){
						    	ohSnap('User already exists!', {color: 'green'});
						    }
						    else
						    	ohSnap('Technical Error: Please contact administrator!', {color: 'green'});
			            }            
			        });
			       	return false;
		        }
			});
		}
	})

	// owl carousel
	var _owl = $('.carousel');
	_owl.owlCarousel({
	    loop:true,
	    nav:true,
	    autoplay:true,
	    responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 4
                }
            }
	})

	$('.stickyForm .btn').on('click', function() {
        $('.stickyForm').toggleClass('active');
    })

	if($('#leads_table').length){
		var table =$('#leads_table').DataTable( {

	    dom: 'Bfrtip',
	    buttons: [
	         { extend: 'copy', text: 'COPY TABLE' },
	          { extend: 'csv', text: 'EXPORT TABLE TO CSV' },
	           { extend: 'excel', text: 'EXPORT TABLE TO EXCEL' }
	    ],
	     initComplete: function () {
	            this.api().columns('5').every( function () {
	                var column = this;
	                var select = $('<select><option value="">All</option></select>')
	                    .appendTo( $(column.header()) )
	                    .on( 'change', function () {
	                        var val = $.fn.dataTable.util.escapeRegex(
	                            $(this).val()
	                        );
	 
	                        column
	                            .search( val ? '^'+val+'$' : '', true, false )
	                            .draw();
	                    } );
	 
	                column.data().unique().sort().each( function ( d, j ) {
	                    select.append( '<option value="'+d+'">'+d+'</option>' )
	                } );
	            } );
	        }
	    });
	}

	//anchor scroll smooth
	$('a[href*="#"]:not([href="#"])').not('.tabs a, ._tabs a').click(function() {
	    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
	      var target = $(this.hash);
	      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
	      if (target.length) {
	        $('html, body').animate({
	          scrollTop: target.offset().top
	        }, 1000);
	        return false;
	      }
	    }
	});
});