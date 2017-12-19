$( document ).ready(function() {
	$( ".menu div" ).click(function () {
		var isactive = $(this).hasClass( "active" );
		if( !isactive && !$(this).hasClass( "first" ) ){
			$(".menu div.active span.name").animate({width:'toggle'},200);
			jQuery(this).children("span.name").animate({width:'toggle'},200);
			$( ".menu div.active" ).removeClass('active');
			$(this).addClass('active');
		}
		if( !isactive ){
			var idcat=$(this).find( ".idcat" ).html();
			$.ajax({
					url : "donnees/get_data.php",
					data : {"cat" : idcat} ,
					dataType : "json",
					type : "GET",
					beforeSend: function(){
						$("div.content").hide();
						componentHandler.upgradeElement(document.getElementsByClassName('mdl-spinner')[0])
						$(".loader").show();
					},
					error    : function(request, error) {
					   $(".loader").hide();				
					   alert("Erreur : responseText: "+request.responseText);
					},
					success: function(response){
						$(".loader").hide();	
						$("div.content").show();
						var aff="";
						for(var i = 0; i < response.length; i++){
							aff+="<div class='mdl-card mdl-shadow--2dp animated fadeInRight ";
							if (response[i]["utilise"]=="V") aff+= "mdl-badge mdl-badge--overlap' data-badge='✓'";
							aff+="'> <div class='mdl-card__title mdl-card--expand mdl-card--border' style='";
							if (response[i]["image"]=="")
								aff+="background: url(\"ressources/img/question.png\") bottom 61% right 24% no-repeat #2196F3;background-size: 80px";
							else 
								aff+="background: url(\"ressources/img/"+response[i]["image"]+".PNG\") center / cover;";
							aff+="'><div class='tagName'data-tagname='";
							aff+=response[i]["nom"];
							aff+="'></div></div>";
							aff+="<div class='mdl-card__supporting-text mdl-card--expand'>";
							aff+=response[i]["description"];
							aff+="</div>";
							var tabtag = response[i]["tags"].split(",");
							if( tabtag[0]!=""){
								aff+="<div class='mdl-card__supporting-text tagdiv'>";
								for(var j = 0; j < tabtag.length; j++){
									aff+="<div class='tag'>";
									aff+=tabtag[j];
									aff+="</div>";
								}
								aff+="</div>"
							}

							aff+="<div class='mdl-card__actions mdl-card--border'><a class='mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent' target='_blank' href='";
							aff+=response[i]["url"];
							aff+="'>Link</a>";
							if(response[i]["note"]!=""){
								aff+="<div class='star-ratings-css'><div class='star-ratings-css-top' style='width:";
								aff+=response[i]["note"];
								aff+="%'><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div> <div class='star-ratings-css-bottom'><span>★</span><span>★</span><span>★</span><span>★</span><span>★</span></div></div>";
							}
							aff+="</div></div>";
						}
						
						$("div.content").html(aff);
						componentHandler.upgradeDom();
					}
			});
		}
	});
	$( ".first" ).click();
});