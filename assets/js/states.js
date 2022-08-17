$(document).ready(function () {
    $("#province").change(function () {

        var districts = document.getElementById("district");

        let northwestern = ['Makonde', 'Makengo', 'Makengo East', 'Makengo West', 'Makengo North', 'Makengo South', 'Makengo Central', 'Makengo North East', 'Makengo North West', 'Makengo South East', 'Makengo South West'];

        let eastern = ['Makengo East', 'Makengo West', 'Makengo North', 'Makengo South', 'Makengo Central', 'Makengo North East', 'Makengo North West', 'Makengo South East', 'Makengo South West'];

        let western = ['Makengo West', 'Makengo North', 'Makengo South', 'Makengo Central', 'Makengo North West', 'Makengo South West'];

        let northern = ['Makengo North', 'Makengo South', 'Makengo Central', 'Makengo North East', 'Makengo North West'];

        let southern = ['Makengo South', 'Makengo Central', 'Makengo South East', 'Makengo South West'];

        let luapula = ['Makengo Central', 'Makengo North East', 'Makengo North West', 'Makengo South East', 'Makengo South West'];

        let central = ['Chibombo', 'Chisamba', 'Chitambo', 'Kabwe', 'Kapiri Mposhi','Luano' ,'Mkushi' ,'Mumbwa' ,'Ngabwe' ,'Serenje','Shibuyunji'];

        let copperbelt = ['Chililabombwe', 'Chingola', 'Kalulushi', 'Kitwe', 'Luanshya', 'Lufwanyama', 'Masaiti', 'Mpongwe', 'Mufulira', 'Ndola'];

        let lusaka = ['Lusaka', 'Chilali', 'Chilali East', 'Chilali West', 'Chilali North', 'Chilali South', 'Chilali Central', 'Chilali North East', 'Chilali North West', 'Chilali South East', 'Chilali South West'];

        let muchinga = ['Bulawayo', 'Bulawayo East', 'Bulawayo West', 'Bulawayo North', 'Bulawayo South', 'Bulawayo Central', 'Bulawayo North East', 'Bulawayo North West', 'Bulawayo South East', 'Bulawayo South West'];

        var val = $(this).val();
        if (val == "north-western") {
            let options = northwestern.map(northwestern => `<option value=${northwestern.toLowerCase()}>${northwestern}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "central") {
            let options = central.map(central => `<option value=${central.toLowerCase()}>${central}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "copperbelt") {
            let options = copperbelt.map(copperbelt => `<option value=${copperbelt.toLowerCase()}>${copperbelt}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "eastern") {
            let options = eastern.map(eastern => `<option value=${eastern.toLowerCase()}>${eastern}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "luapula") {
            let options = luapula.map(luapula => `<option value=${luapula.toLowerCase()}>${luapula}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "lusaka") {
            let options = lusaka.map(lusaka => `<option value=${lusaka.toLowerCase()}>${lusaka}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "muchinga") {
            let options = muchinga.map(muchinga => `<option value=${muchinga.toLowerCase()}>${muchinga}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "northern") {
            let options = northern.map(northern => `<option value=${northern.toLowerCase()}>${northern}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "southern") {
            let options = southern.map(southern => `<option value=${southern.toLowerCase()}>${southern}</option>`).join('\n');
            districts.innerHTML = options;
        } 

        else if (val == "western") {
            let options = western.map(western => `<option value=${western.toLowerCase()}>${western}</option>`).join('\n');
            districts.innerHTML = options;
        }
    });
});