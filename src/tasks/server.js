const bs = require('browser-sync');

module.exports = function server() {
	bs.init({
		server: {
			baseDir: 'dev/',
			host: '192.168.0.104',
			port: '5000',
		},
	     online: true,
	     https: false,
	     reloadDebounce: 500,
		callbacks: {
			ready: function (err, bs) {
				bs.addMiddleware("*", function (req, res) {
					res.writeHead(302, {
						location: "404.html"
					});
					res.end("Redirecting!");
				});
			}
		},
		logPrefix: 'BS-HTML:',
		logLevel: 'info',
		logConnections: true,
		logFileChanges: true,
		open: true
	})
}
