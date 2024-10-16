function parse_countries(data) {
	var $menu = $('.locations.dropdown .menu');
	$menu.children().remove();

	if(data && data.countries) {
		for(var i = 0; data.countries[i]; i++) {
			var country = data.countries[i];

			$menu.append('<li><a href="'+country.link+'" data-href="'+country.link+'">'+country.name+'</a></li>');
		}
	}
}
