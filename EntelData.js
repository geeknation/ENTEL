var EntelData={
	
	"fetchData":function($data,$method,$server,$datatype) {
		$.ajax({
			cache : false,
			url:$scipt,
			dataType : $datatype,
			data : Sdata,
			type : $method,
			beforeSend : function() {

			},
			complete : function() {
				
			},
			success:function(Sdata){
				return Sdata;
			}
		});
	}

};
