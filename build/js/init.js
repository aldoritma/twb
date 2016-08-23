	window.onload = function() {

	}

Pace.on('done', function() {


	var timeline_loader = new TimelineMax();
	var loader = document.getElementById('loader'),
		logo    = document.getElementById('logo-loader')


 	timeline_loader.to(loader, 1, {top: "-100%"}, 1);

	var timeline = new TimelineMax({delay: 2});
	var decor = {
		land : "#land",
		tree: {
			small: "#tree-small",
			grass: '#tree-grass',
			big: '#tree-big'
		},
		cloud: "#cloud",
		grass: '#grass',
		flower:{
			white: '#flower-white',
			big: '#flower-red-big',
			small: '#flower-red-small'
		},
		characters: {
			duck: '#duck',
			fish: '#fish',
			butterfly: '#butterfly',
			turtle: '#turtle',
			elephant: '#elephant'
		}
	};


	timeline.add(animated(decor.land).bounce(-100, 100));

	timeline.add(animated(decor.cloud).fading(1))

	timeline.add(animated(decor.characters.duck).fading(1))
			.add(animated(decor.characters.fish).fading(1))
			.add(animated(decor.characters.butterfly).fading(1))
			.add(animated(decor.characters.turtle).fading(1))
			.add(animated(decor.characters.elephant).fading(1))


	// SVG Animation




	/**
	 ** Scroll to bottom
	 ** added auto scroll to section prizes
	 */
	 var toggle_scroll = document.getElementById('scroll-bottom'),
	 	arrow		   = document.getElementById('arrow-down'),
	 	prize_offset ;

	 	if(toggle_scroll != null)
	 	{


	 	toggle_scroll.addEventListener('click', function(e) {
	 		e.preventDefault();

	 		prize_offset = document.getElementById('section--prize')

	 		TweenMax.to(window, 1, {
	 			scrollTo:{
	 				y: prize_offset.offsetTop
	 			},
	 			ease: Circ.easeOut
	 		})
	 	})

	 	TweenMax.to(arrow, 0.5, {
	 		y: 5,
	 		repeat: 1000,
	 		yoyo: true,
	 		delay: 0.4
	 	})
	 	}
	/**
	 ** Scroll to section
	 ** added auto scroll to section, when window contain section
	 */

	//  var controller =  new ScrollMagic.Controller();

	tinymce.init({   
		selector: '#editor--story',
		height: 150
	});





	var uploader = document.querySelector('.uploader__wrapper');
	if (uploader == null) {
		return
	 };
	document.querySelector('.uploader__wrapper').addEventListener('dragover', handleDragOver, false)
	document.querySelector('.uploader__wrapper').addEventListener('drop', handleFileSelect, false)

	document.getElementById('uploader').addEventListener('change', handleFileSelect, false);

	function handleFileSelect(evt) {
		evt.preventDefault();
		evt.stopPropagation();
		if(evt.dataTransfer) {
			files = evt.dataTransfer.files;
		}else {
			files = evt.target.files;
		} 


		// Loop through the FileList and render image files as thumbnails.
		_.each(files, function(file) {
			var reader = new FileReader();

			reader.onload = (function(theFile) {
				return function(e) {
					// Render thumbnail.
					document.getElementById('preview-template').style.display = 'block';
					document.getElementById('image--preview').setAttribute('src', e.target.result)
					document.getElementById('image--name').innerHTML =  file.name;
				};
			})(file);

			reader.readAsDataURL(file)

		});
	};

	function handleDragOver(e) {
		e.preventDefault();
		e.stopPropagation();

	};


})

