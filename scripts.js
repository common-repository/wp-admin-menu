jQuery.noConflict();
(function($) {
	var docBody;
	var wpamCont;
	var wpamItem;
	var brwsr;
	var brwsrVrsn;
	var ood = false;
	var verMozilla	= 1.9;
	var verWebkit	= 533;
	var verOpera	= 10;
	var verMsie		= 8;
	
	
	var wp1		= ['Template Tags','http://codex.wordpress.org/Template_Tags'];
	var wp2		= ['Function Reference','http://codex.wordpress.org/Function_Reference'];
	var wp3		= ['Include Tags','http://codex.wordpress.org/Include_Tags'];
	var wp4		= ['Conditional Tags','http://codex.wordpress.org/Conditional_Tags'];
	var wpLinks	= [wp1,wp2,wp3,wp4];

	/*	BEGIN: Formatting
		Formatting the page to display the menu properly	*/
	docBody = $('body:first');
	$(docBody).css({paddingTop:'35px',position:'relative'})
		.prepend('<ul id="wpam-container"></ul>');

	if (suppress==1) {
		var adminmenu	= $('#adminmenu');
		var wpbody		= $('#wpbody');
		$(adminmenu).hide();
		$(wpbody).css({marginLeft:'10px'});
	}

	/*	END: Formatting	*/
	wpamCont = $('#wpam-container');
	$(wpamCont).append('<li id="wpam-title"></li>');
	$(wpamCont).append('<li class="seperator">&nbsp;</li>');
	
	brwsr = $.browser;
	brwsrVrsn = brwsr.version.substr(0,3);
	if (brwsr.mozilla&&(brwsrVrsn<verMozilla)) {
		ood = 'mozilla';
	} else if (brwsr.webkit&&(brwsrVrsn<verWebkit)) {
		ood = 'webkit';
	} else if (brwsr.opera&&(brwsrVrsn<verOpera)) {
		ood = 'opera';
	} else if (brwsr.msie&&(brwsrVrsn<verMsie)) {
		ood = 'msie';
	}
	if (ood==false) {
		var adminPage = baseUrl+'/wp-admin';
		$.ajax({
			url: 		adminPage,
			success:	function(data) {
				var adminMenuChild = $(data).find('#adminmenu > li');
				$(adminMenuChild).each(function(i) {
					var toPrint = '';
					if ($(this).attr('class')=='wp-menu-separator'||$(this).attr('class')=='wp-menu-separator-last') {
						toPrint += '<li class="seperator">&nbsp;</li>';
					} else {
						var submenuItem = $(this).find('a.menu-top');
						var submenuText = $(submenuItem).html();
						var submenuLink = $(submenuItem).attr('href');
						toPrint += '<li><a href="'+baseUrl+'/wp-admin/'+submenuLink+'">'+submenuText+'</a>';
						var adminMenuGrand = $(this).find('.wp-submenu li');
						if (adminMenuGrand.length>0) {
							toPrint += '<ul>';
							$(adminMenuGrand).each(function() {
								var subSubmenuItem = $(this).find('a');
								var subSubmenuText = $(subSubmenuItem).html();
								var subSubmenuLink = $(subSubmenuItem).attr('href');
								if (submenuText.indexOf(subSubmenuText)==-1) {
									toPrint += '<li><a href="'+baseUrl+'/wp-admin/'+subSubmenuLink+'">'+subSubmenuText+'</a>';
								}
							});
							toPrint += '</ul>';
						}
						toPrint += '</li>'
					}
					$(wpamCont).append(toPrint);
				});
				if (wpLinks.length>0 && wpamHideDev != 1) {
					toPrint = '<li class="seperator right margin">&nbsp;</li>';
					toPrint += '<li class="right"><a href="http://wordpress.org" title="WordPress" target="_blank">WordPress</a><ul>';
					for (i=0; i<wpLinks.length; i++) {
						toPrint += '<li><a href="'+wpLinks[i][1]+'" title="'+wpLinks[i][0]+'" target="_blank">'+wpLinks[i][0]+'</a></li>';
					}
					toPrint += '</ul></li>';
					toPrint += '<li class="seperator right">&nbsp;</li>';
					$(wpamCont).append(toPrint);
				}
				if (showEdit==1) {
					toPrint = '<li class="right">'+editPostLink+'</li>';
					toPrint += '<li class="seperator right">&nbsp;</li>';
					$(wpamCont).append(toPrint);
				}
				heightAdjust(wpamCont);
				if ($.browser.msie) {
					setupShowHide();
				}
			}, // end success
			fail:		function() {
				alert('fail');	
			}
		});
	} else {
		var toPrint = '<li id="wpam-ood">You&rsquo;ll need to update your browser to use this plugin:</li>';
		toPrint += '<li><a class="wpam-icon" id="wpam-firefox" href="http://www.mozilla.com" title="Mozilla | Firefox web browser" target="_blank"><span></span>Mozilla Firefox 3.6</a></li>';
		toPrint += '<li><a class="wpam-icon" id="wpam-chrome" href="http://www.google.com/chrome" title="Google Chrome - Get a fast new browser. For PC, Mac, and Linux." target="_blank"><span></span>Google Chrome 6</a></li>';
		toPrint += '<li><a class="wpam-icon" id="wpam-safari" href="http://www.apple.com/safari/" title="Apple - Safari - Browse the web in smarter, more powerful ways." target="_blank"><span></span>Apple Safari 5</a></li>';
		toPrint += '<li><a class="wpam-icon" id="wpam-opera" href="http://www.opera.com/download/" title="Opera Web Browser | Faster &amp; safer | Download the new Internet browsers free" target="_blank"><span></span>Opera 10</a></li>';
		toPrint += '<li><a class="wpam-icon" id="wpam-ie" href="http://www.microsoft.com/windows/internet-explorer/default.aspx" title="Internet Explorer 8" target="_blank"><span></span>Microsoft Internet Explorer 8</a></li>';
		$(wpamCont).append(toPrint);
	}
	
	// height adjustment
	$(window).resize(function() {
		heightAdjust(wpamCont);
	});

	function heightAdjust(object) {
		objHeight = $(object).height();
		$(docBody).css({paddingTop:objHeight+'px'});
		if (fluencyInstalled==1)
			$('#adminmenu').css({top:objHeight+'px'});
	}
	
	function setupShowHide() {
		wpamItem = $('#wpam-container > li');
		$(wpamItem).children('ul').hide();
		$(wpamItem).hover(showSub, hideSub);
	}
	function showSub() {
		$(this).children('ul').show('', function() {
			$(this).find('a').css({background:'none'});
		});
	}
	function hideSub() {
		$(this).children('ul').hide();
	}
})(jQuery);
