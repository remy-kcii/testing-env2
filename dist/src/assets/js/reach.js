function parse_reach(data) {
	if(data) {
		if (data.num_people_qualifier) {
			$('#num-people-qualifier').html(data.num_people_qualifier);
		}

		if (data.num_locations_qualifier) {
			$('#num-locations-qualifier').html(data.num_locations_qualifier);
		}

		if (data.num_partners_qualifier) {
			$('#num-partners-qualifier').html(data.num_partners_qualifier);
		}

		if (data.num_people) {
			$('#num-people').html(data.num_people.toLocaleString());
		}

		if (data.num_locations) {
			$('#num-locations').html(data.num_locations.toLocaleString());
		}

		if (data.num_partners) {
			$('#num-partners').html(data.num_partners.toLocaleString());
		}
	}
}
