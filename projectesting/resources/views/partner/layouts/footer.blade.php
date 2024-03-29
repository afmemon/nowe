		<script src="{{asset("")}}components/jquery/dist/jquery.js"></script>

		
		<script src="{{asset("")}}components/bootstrap/dist/js/bootstrap.js"></script>

		<script src="{{asset("")}}components/_mod/jquery-ui.custom/jquery-ui.custom.js"></script>
		<script src="{{asset("")}}components/jqueryui-touch-punch/jquery.ui.touch-punch.js"></script>
		<script src="{{asset("")}}components/_mod/easypiechart/jquery.easypiechart.js"></script>
		<script src="{{asset("")}}components/jquery.sparkline/index.js"></script>
		<script src="{{asset("")}}components/Flot/jquery.flot.js"></script>
		<script src="{{asset("")}}components/Flot/jquery.flot.pie.js"></script>
		<script src="{{asset("")}}components/Flot/jquery.flot.resize.js"></script>

		<script src="{{asset("")}}assets/js/src/elements.scroller.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.colorpicker.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.fileinput.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.typeahead.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.wysiwyg.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.spinner.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.treeview.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.wizard.js"></script>
		<script src="{{asset("")}}assets/js/src/elements.aside.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.basics.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.scrolltop.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.ajax-content.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.touch-drag.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.sidebar.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.submenu-hover.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.widget-box.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.settings.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.settings-rtl.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.settings-skin.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.widget-on-reload.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.searchbox-autocomplete.js"></script>

		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});

			jQuery(function($) {
			 $('#btn-login-dark').on('click', function(e) {
				$('body').attr('class', 'login-layout');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-light').on('click', function(e) {
				$('body').attr('class', 'login-layout light-login');
				$('#id-text2').attr('class', 'grey');
				$('#id-company-text').attr('class', 'blue');
				
				e.preventDefault();
			 });
			 $('#btn-login-blur').on('click', function(e) {
				$('body').attr('class', 'login-layout blur-login');
				$('#id-text2').attr('class', 'white');
				$('#id-company-text').attr('class', 'light-blue');
				
				e.preventDefault();
			 });
			 
			});
		</script>


		<script type="text/javascript">
			jQuery(function($) {
				$('.easy-pie-chart.percentage').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
					var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
					var size = parseInt($(this).data('size')) || 50;
					$(this).easyPieChart({
						barColor: barColor,
						trackColor: trackColor,
						scaleColor: false,
						lineCap: 'butt',
						lineWidth: parseInt(size/10),
						animate: ace.vars['old_ie'] ? false : 1000,
						size: size
					});
				})
			
				$('.sparkline').each(function(){
					var $box = $(this).closest('.infobox');
					var barColor = !$box.hasClass('infobox-dark') ? $box.css('color') : '#FFF';
					$(this).sparkline('html',
									 {
										tagValuesAttribute:'data-values',
										type: 'bar',
										barColor: barColor ,
										chartRangeMin:$(this).data('min') || 0
									 });
				});
			
			
			  //flot chart resize plugin, somehow manipulates default browser resize event to optimize it!
			  //but sometimes it brings up errors with normal resize event handlers
			  $.resize.throttleWindow = false;
			
			  var placeholder = $('#piechart-placeholder').css({'width':'90%' , 'min-height':'150px'});
			  var data = [
				{ label: "social networks",  data: 38.7, color: "#68BC31"},
				{ label: "search engines",  data: 24.5, color: "#2091CF"},
				{ label: "ad campaigns",  data: 8.2, color: "#AF4E96"},
				{ label: "direct traffic",  data: 18.6, color: "#DA5430"},
				{ label: "other",  data: 10, color: "#FEE074"}
			  ]
			  function drawPieChart(placeholder, data, position) {
			 	  $.plot(placeholder, data, {
					series: {
						pie: {
							show: true,
							tilt:0.8,
							highlight: {
								opacity: 0.25
							},
							stroke: {
								color: '#fff',
								width: 2
							},
							startAngle: 2
						}
					},
					legend: {
						show: true,
						position: position || "ne", 
						labelBoxBorderColor: null,
						margin:[-30,15]
					}
					,
					grid: {
						hoverable: true,
						clickable: true
					}
				 })
			 }
			 drawPieChart(placeholder, data);
			
			 /**
			 we saved the drawing function and the data to redraw with different position later when switching to RTL mode dynamically
			 so that's not needed actually.
			 */
			 placeholder.data('chart', data);
			 placeholder.data('draw', drawPieChart);
			
			
			  //pie chart tooltip example
			  var $tooltip = $("<div class='tooltip top in'><div class='tooltip-inner'></div></div>").hide().appendTo('body');
			  var previousPoint = null;
			
			  placeholder.on('plothover', function (event, pos, item) {
				if(item) {
					if (previousPoint != item.seriesIndex) {
						previousPoint = item.seriesIndex;
						var tip = item.series['label'] + " : " + item.series['percent']+'%';
						$tooltip.show().children(0).text(tip);
					}
					$tooltip.css({top:pos.pageY + 10, left:pos.pageX + 10});
				} else {
					$tooltip.hide();
					previousPoint = null;
				}
				
			 });
			
				/////////////////////////////////////
				$(document).one('ajaxloadstart.page', function(e) {
					$tooltip.remove();
				});
			
			
			
			
				var d1 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d1.push([i, Math.sin(i)]);
				}
			
				var d2 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.5) {
					d2.push([i, Math.cos(i)]);
				}
			
				var d3 = [];
				for (var i = 0; i < Math.PI * 2; i += 0.2) {
					d3.push([i, Math.tan(i)]);
				}
				
			
				var sales_charts = $('#sales-charts').css({'width':'100%' , 'height':'220px'});
				$.plot("#sales-charts", [
					{ label: "Domains", data: d1 },
					{ label: "Hosting", data: d2 },
					{ label: "Services", data: d3 }
				], {
					hoverable: true,
					shadowSize: 0,
					series: {
						lines: { show: true },
						points: { show: true }
					},
					xaxis: {
						tickLength: 0
					},
					yaxis: {
						ticks: 10,
						min: -2,
						max: 2,
						tickDecimals: 3
					},
					grid: {
						backgroundColor: { colors: [ "#fff", "#fff" ] },
						borderWidth: 1,
						borderColor:'#555'
					}
				});
			
			
				$('#recent-box [data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('.tab-content')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			
			
				$('.dialogs,.comments').ace_scroll({
					size: 300
			    });
				
				
				//Android's default browser somehow is confused when tapping on label which will lead to dragging the task
				//so disable dragging when clicking on label
				var agent = navigator.userAgent.toLowerCase();
				if(ace.vars['touch'] && ace.vars['android']) {
				  $('#tasks').on('touchstart', function(e){
					var li = $(e.target).closest('#tasks li');
					if(li.length == 0)return;
					var label = li.find('label.inline').get(0);
					if(label == e.target || $.contains(label, e.target)) e.stopImmediatePropagation() ;
				  });
				}
			
				$('#tasks').sortable({
					opacity:0.8,
					revert:true,
					forceHelperSize:true,
					placeholder: 'draggable-placeholder',
					forcePlaceholderSize:true,
					tolerance:'pointer',
					stop: function( event, ui ) {
						//just for Chrome!!!! so that dropdowns on items don't appear below other items after being moved
						$(ui.item).css('z-index', 'auto');
					}
					}
				);
				$('#tasks').disableSelection();
				$('#tasks input:checkbox').removeAttr('checked').on('click', function(){
					if(this.checked) $(this).closest('li').addClass('selected');
					else $(this).closest('li').removeClass('selected');
				});
			
			
				$('#task-tab .dropdown-hover').on('mouseenter', function(e) {
					var offset = $(this).offset();
			
					var $w = $(window)
					if (offset.top > $w.scrollTop() + $w.innerHeight() - 100) 
						$(this).addClass('dropup');
					else $(this).removeClass('dropup');
				});
			
			})
		</script>

		<link rel="stylesheet" href="{{asset("")}}assets/css/ace.onpage-help.css" />
		<link rel="stylesheet" href="{{asset("")}}docs/assets/js/themes/sunburst.css" />

		<script type="text/javascript"> ace.vars['base'] = '..'; </script>
		<script src="{{asset("")}}assets/js/src/elements.onpage-help.js"></script>
		<script src="{{asset("")}}assets/js/src/ace.onpage-help.js"></script>
		<script src="{{asset("")}}docs/assets/js/rainbow.js"></script>
		<script src="{{asset("")}}docs/assets/js/language/generic.js"></script>
		<script src="{{asset("")}}docs/assets/js/language/html.js"></script>
		<script src="{{asset("")}}docs/assets/js/language/css.js"></script>
		<script src="{{asset("")}}docs/assets/js/language/javascript.js"></script>
	</body>
</html>
