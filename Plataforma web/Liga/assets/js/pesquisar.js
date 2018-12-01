$('input.typeahead').typeahead({
    source:  function (query, process) {
    return $.get('/pesquisar', { query: query }, function (data) {
    		console.log(data);
	        data = $.parseJSON(data);
	        return process(data);
        });
    }
});