var url = window.location;

$('ul.sidebar-menu a').filter(function() {

	return this.href == url;

}).parent().addClass('active');

$('ul.treeview-menu a').filter(function() {

	return this.href == url;

}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');