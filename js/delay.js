function pingtest() {
	var sttime = new Date().getTime();
	$.ajax(
		{
			type: 'GET',
			timeout : 3000,
			url: 'ping.json',
			data: {
				't': sttime
			},
			success: function(data) {
				var curtime = new Date().getTime();
				var pingtime = curtime - sttime;
				$("#ping").html("Ping:" + pingtime  + "ms");
			},
			dataType: 'json',
			error: function() {
				$("#ping").html("请检查网络连接");
			}
		}
	);
}
setTimeout("pingtest()",1000);
setInterval("pingtest()",5000);