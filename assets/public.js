(function () {
	'use strict';

	function toggleMenuSidebar() {
		const toggler = document.querySelector('.sa-toggle');
		const sidebars = document.querySelectorAll('.main-sidebar');
		const contentWrappers = document.querySelectorAll('.content-wrapper');

		if (!toggler || !sidebars.length) return;

		const COLLAPSED = 72;
		const EXPANDED  = 300;

		const savedState = localStorage.getItem('voxelSidebarToggleStatus');
		const shouldBeCollapsed = savedState === 'collapsed';

		function setHtmlClass(collapsed) {
			document.documentElement.classList.toggle('voxel-sidebar-collapsed', collapsed);
		}

		sidebars.forEach((sidebar) => {
			sidebar.style.width = shouldBeCollapsed ? COLLAPSED + 'px' : EXPANDED + 'px';
			if (shouldBeCollapsed) {
				sidebar.classList.add('active');
			} else {
				sidebar.classList.remove('active');
			}
		});

		contentWrappers.forEach((wrapper) => {
			wrapper.style.marginLeft = shouldBeCollapsed ? COLLAPSED + 'px' : EXPANDED + 'px';
		});

		setHtmlClass(shouldBeCollapsed);

		toggler.addEventListener('click', (e) => {
			e.preventDefault();

			const currentWidth = parseInt(getComputedStyle(sidebars[0]).width, 10);
			const isCollapsed = currentWidth === COLLAPSED;
			const willBeCollapsed = !isCollapsed;

			sidebars.forEach((sidebar) => {
				sidebar.style.width = willBeCollapsed ? COLLAPSED + 'px' : EXPANDED + 'px';
				if (willBeCollapsed) {
					sidebar.classList.add('active');
				} else {
					sidebar.classList.remove('active');
				}
			});

			contentWrappers.forEach((wrapper) => {
				wrapper.style.marginLeft = willBeCollapsed ? COLLAPSED + 'px' : EXPANDED + 'px';
			});

			setHtmlClass(willBeCollapsed);
			localStorage.setItem('voxelSidebarToggleStatus', willBeCollapsed ? 'collapsed' : 'expanded');
		});
	}

	document.addEventListener('DOMContentLoaded', () => {
		toggleMenuSidebar();
	});

})();
