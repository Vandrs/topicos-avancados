$(document).ready(function(){
	var table = $("#table-movies");
	var movies = [];
	$(table).find("tbody.lister-list>tr").each(function(){
		movies.push(buildObject($(this)));
	});
	updateMovies(movies);
});

function buildObject(tr){
	var movie = {
		imdb_ref:extractIMDBRef(tr),
		title:$(tr).find(".titleColumn > a").text(),
		year:$(tr).find(".titleColumn > .secondaryInfo").text(),
		image_url:extractUrlImage($(tr))
	}
	return movie;
}


function extractIMDBRef(tr){
	var link = tr.find(".titleColumn > a").attr("href");
	var arrLink = link.split("/");
	return arrLink[2];
}

function extractUrlImage(tr){
	var link = tr.find(".posterColumn > a img").attr("src");
	var arrLink = link.split("_");
	return arrLink[0]+"jpg";
}

function updateMovies(movies){
	var postData = {
		_token:TOKEN,
		"movies":movies
	}
	$.ajax({
		url:INSERT_MOVIES_ROUTE,
		type:"POST",
		data:postData,
		succes:function(data){
			alert("Foi");
		}
	});
}