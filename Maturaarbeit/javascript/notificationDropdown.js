/** 
 * When the user clicks on the button,
 * toggle between hiding and showing the dropdown content
 */
function notifications() {
	document.getElementById("notification-content").classList.toggle("show");
}
// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
	if (!event.target.matches('.dropbtnNotification'||'.dropdwnLinkNotification')) {
		var notifications = document.getElementsByClassName("notification-content");
		for (var i = 0; i < notifications.length; i++) {
			var openNotification = notifications[i];
			if (openNotification.classList.contains('show')) {
				openNotification.classList.remove('show');
			}
		}
	}
}