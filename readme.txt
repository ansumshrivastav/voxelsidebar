=== Voxel Sidebar Toggle ===

Contributors: ansum
Tags: sidebar, navigation, collapse, toggle, dashboard
Requires at least: 5.0
Tested up to: 6.4
Stable tag: 1.0.0
Requires PHP: 7.4
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Adds a collapsible sidebar menu with toggle functionality and localStorage persistence. Prevents layout shift on page reload.

== Description ==

Voxel Sidebar Toggle enhances your dashboard or admin layout with a collapsible navigation sidebar. Users can collapse the sidebar to save space and the preference is remembered across page reloads. The plugin applies the saved state before the first paint to avoid layout shift (CLS).

**Features:**
* Collapsible sidebar with smooth transitions
* State persisted in localStorage
* No layout shift on reload (critical CSS + early script)
* Works on frontend and admin
* Responsive (sidebar hidden on mobile)

== Installation ==

1. Upload the `voxel-sidebar-toggle` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Ensure your theme or template uses the required CSS classes (see below)

== Required CSS Classes ==

Your theme or template must include these CSS classes for the plugin to work:

**1. main-sidebar**
* Location: The left navigation panel (sidebar container)
* Purpose: The element that collapses/expands
* Example: Wrap your navigation menu in a div with class `main-sidebar`

**2. sa-toggle**
* Location: The toggle button in the header (typically next to the logo)
* Purpose: The clickable element that triggers collapse/expand
* Example: Add class `sa-toggle` to your hamburger or menu toggle button

**3. content-wrapper**
* Location: The main content area (right of the sidebar)
* Purpose: Adjusts its left margin when sidebar collapses/expands
* Example: Wrap your main content in a div with class `content-wrapper`

== Example HTML Structure ==

    <aside class="main-sidebar">
      <nav>
        <ul>
          <li><a href="#">Overview</a></li>
          <li><a href="#">Forms</a></li>
        </ul>
      </nav>
    </aside>

    <header>
      <button class="sa-toggle" aria-label="Toggle sidebar">☰</button>
      <h1>Your App Name</h1>
    </header>

    <main class="content-wrapper">
      <!-- Your main content here -->
    </main>

== Changelog ==

= 1.0.0 =
* Initial release
* Collapsible sidebar with toggle
* localStorage persistence
* Layout shift prevention

== Credits ==

* Developer: Ansum, Rajib , Garvit
* Company: Diime Technology
* Website: https://diimetechnology.com

== Upgrade Notice ==

= 1.0.0 =
Initial release of Voxel Sidebar Toggle.
