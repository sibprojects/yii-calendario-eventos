let calendar = null;

$(function() {

    var currentYear = new Date().getFullYear();

    calendar = new Calendar('#calendar', { 
				style:'background',
        enableContextMenu: false,
        enableRangeSelection: false,
        mouseOnDay: function(e) {
            if(e.events.length > 0) {
                var content = '';
                
                for(var i in e.events) {
										var price = Math.ceil(objectPrice + (objectPrice * descuentos[e.events[i].descuento].percent / 100));
                    content += '<div class="event-tooltip-content">'
                                    + '<div class="event-descuento">' + descuentos[e.events[i].descuento].name + '</div>'
                                    + '<div class="event-descuento"><b>' + price + ' &euro;</b></div>'
                                + '</div>';
                }
            
                $(e.element).popover({ 
                    trigger: 'manual',
                    container: 'body',
                    html:true,
                    content: content
                });
                
                $(e.element).popover('show');
            }
        },
        mouseOutDay: function(e) {
            if(e.events.length > 0) {
                $(e.element).popover('hide');
            }
        }
    });

		var dataSource = JSON.parse($('#days').text());
		for(d of dataSource){
			d.startDate = new Date(d.startDate);
			d.endDate = new Date(d.endDate);
		}
    calendar.setDataSource(dataSource);
});
