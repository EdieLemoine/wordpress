module.exports = {
	prod: {
		files: [{
			expand: true,
			src: ['style.css'],
			dest: '',
			filter: 'isFile'
		}, ]
	}
};
