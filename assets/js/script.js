window.addEventListener("load", () => {
	switch (window.location.hash) {
		case "#register":
			const registerModal = new bootstrap.Modal("#registerModal");
			registerModal.show();
			break;
		case "#login":
			const loginModal = new bootstrap.Modal("#loginModal");
			loginModal.show();
			break;
		case "#update":
			const updateModal = new bootstrap.Modal("#updateProfileModal");
			updateModal.show();
			break;
		case "#addCabin":
			const addCabinModal = new bootstrap.Modal("#addCabinModal");
			addCabinModal.show();
			break;
		case "#addFacility":
			const addFacilityModal = new bootstrap.Modal("#addFacilityModal");
			addFacilityModal.show();
			break;
		case "#addService":
			const addServiceModal = new bootstrap.Modal("#addServiceModal");
			addServiceModal.show();
			break;
		default:
			break;
	}
});
