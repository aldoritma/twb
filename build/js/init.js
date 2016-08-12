
window.onload = function () {


	var timeline = new TimelineMax();
	var decor = {
		land : "#land",
		tree: {
			small: "#tree-small",
			grass: '#tree-grass',
			big: '#tree-big'
		},
		cloud: "#cloud"
	};

	


	timeline.add(animated(decor.land).bounce(-200, 200))
			.add(animated(decor.tree.small).bounce(-50, 50), 1)
			.add(animated(decor.tree.grass).bounce(-50, 50), 1.5)
			.add(animated(decor.tree.big).bounce(-50, 50), 2)

	timeline.add(animated(decor.cloud).fading(1))

}