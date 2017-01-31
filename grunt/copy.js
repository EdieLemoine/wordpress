module.exports = {
	prod: {
		files: [{
			expand: true,
			src: ['<%= c.css %>/style.css'],
			dest: '',
			filter: 'isFile'
		}, ]
	}
};
