function initCharts(barChart,lineChart) {

	// Bar Chart
	
	Morris.Bar({
		element: 'bar-charts',
		data: lineChart,
		xkey: 'date',
		ykeys: ['count'],
		labels: ['Total Notes'],
		lineColors: ['#9a55ff'],
		lineWidth: '3px',
		barColors: ['#9a55ff'],
		resize: true,
		redraw: true
	});
	
	// Line Chart
	
	Morris.Bar({
		element: 'line-charts',
		data: barChart,
		xkey: 'date',
		ykeys: ['count'],
		labels: ['Total Courses'],
		lineColors: ['#9a55ff'],
		lineWidth: '3px',
		resize: true,
		redraw: true
	});
		
}


 