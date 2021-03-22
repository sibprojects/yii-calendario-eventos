let calendar = null;

function editEvent(event) {
    $('#event-modal input[name="event-index"]').val(event ? event.id : '');
    $('#event-modal select[name="event-descuento"]').val(event ? event.descuento : '');
    $('#event-modal input[name="event-start-date"]').datepicker('update', event ? event.startDate : '');
    $('#event-modal input[name="event-end-date"]').datepicker('update', event ? event.endDate : '');
    $('#event-modal').modal();
}

function deleteEvent(event) {
    var dataSource = calendar.getDataSource();
    calendar.setDataSource(dataSource.filter(item => item.id != event.id));
}

function saveEvent() {
		var descuento = $('#event-modal select[name="event-descuento"]').val();

		if(!descuento){
	    $('#event-modal').modal('hide');
			return;
		}

    var event = {
        id: $('#event-modal input[name="event-index"]').val(),
        descuento: descuento,
				color: descuentos[descuento].color,
        startDate: $('#event-modal input[name="event-start-date"]').datepicker('getDate'),
        endDate: $('#event-modal input[name="event-end-date"]').datepicker('getDate')
    }
    
    var dataSource = calendar.getDataSource();

    if (event.id) {
        for (var i in dataSource) {
            if (dataSource[i].id == event.id) {
                dataSource[i].descuento = event.descuento;
                dataSource[i].color = descuentos[event.descuento].color;
                dataSource[i].startDate = event.startDate;
                dataSource[i].endDate = event.endDate;
            }
        }
    }
    else
    {
        var newId = 0;
        for(var i in dataSource) {
            if(dataSource[i].id > newId) {
                newId = dataSource[i].id;
            }
        }
        
        newId++;
        event.id = newId;
    
        dataSource.push(event);
    }
    
    calendar.setDataSource(dataSource);
    $('#event-modal').modal('hide');

		var days = JSON.stringify(calendar.getDataSource());
		$('#objectform-days').val(days)
}

$(function() {

    var currentYear = new Date().getFullYear();

    calendar = new Calendar('#calendar', { 
//				language: 'en',
				style:'background',
        enableContextMenu: true,
        enableRangeSelection: true,
        contextMenuItems:[
            {
                text: 'Update',
                click: editEvent
            },
            {
                text: 'Delete',
                click: deleteEvent
            }
        ],
        selectRange: function(e) {
            editEvent({ startDate: e.startDate, endDate: e.endDate });
        },
        mouseOnDay: function(e) {
            if(e.events.length > 0) {
                var content = '';
                
                for(var i in e.events) {
                    content += '<div class="event-tooltip-content">'
                                    + '<div class="event-descuento">' + descuentos[e.events[i].descuento].name + '</div>'
                                    + '<div class="event-descuento"><b>' + descuentos[e.events[i].descuento].percent + ' %</b></div>'
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
        },
        dayContextMenu: function(e) {
            $(e.element).popover('hide');
        }
/*
        dataSource: [
            {
                id: 0,
                descuento: 't_alta',
								color: descuentos['t_alta'].color,
                startDate: new Date(currentYear, 4, 28),
                endDate: new Date(currentYear, 4, 29)
            },
            {
                id: 1,
                descuento: 'e_normal',
								color: descuentos['e_normal'].color,
                startDate: new Date(currentYear, 10, 17),
                endDate: new Date(currentYear, 10, 17)
            }
        ]
*/
    });

		var dataSource = JSON.parse($('#objectform-days').val());
		for(d of dataSource){
			d.startDate = new Date(d.startDate);
			d.endDate = new Date(d.endDate);
		}
    calendar.setDataSource(dataSource);

//		calendar.setAllowOverlap(0);
    
    $('#save-event').click(function() {
        saveEvent();
    });
});
