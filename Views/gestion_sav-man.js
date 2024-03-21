   
   
    var saisie2=document.getElementById( 'newMdp' );
    var saisie =document.getElementById( 'confMpd' );

    var url = document.location.href;
    //console.log(url);
    let table = new DataTable('#myTable', {
        scrollY: 400,
        
       
        // scrollX: 500,
        columnDefs: [
            { type: "extract-date-fr", targets: [1]}
        ],
        //Creer le tableau en francais
        language: {
            zeroRecords: "Aucun résultat trouvé",
            info: "",
            infoEmpty: "",
            infoFiltered: "",
            loadingRecords: "Chargement...",
            processing: "Traitement...",
            lengthMenu: "",
            search: "Rechercher : ",
            zeroRecords: "Aucun resultat",
            
            paginate: {
                first: "Premier",
                last: "Dernier",
                next: "Suivant",
                previous: "Précédent",
            },
        },
        aria: {
            sortAscending: ": activer pour trier la colonne par ordre croissant",
            sortDescending: ": activer pour trier la colonne par ordre décroissant",
        },
        iDisplayLength: 30,
        searching: true,
        responsive: true,
        select: true
    });

    ///////////////////////////////////////////////////////
    if (url.includes('resetMdp')) {

        var onReset =document.getElementById( 'monBoutonOnReset' );
        var offReset =document.getElementById( 'monBoutonOffReset' );
        var onResetConf =document.getElementById( 'monBoutonOnResetConf' );
        var offResetConf =document.getElementById( 'monBoutonOffResetConf' );
        var saisie2=document.getElementById( 'newMdp' );
        var saisie =document.getElementById( 'confMpd' );

        onReset.addEventListener( "click", function() {
            var attribut = saisie2.getAttribute( 'type');
            if(attribut == 'password'){
                saisie2.type='text';
                onReset.style.display="none";
                offReset.style.display="flex";
            }
        });
    
        offReset.addEventListener( "click", function() {
            var attribut = saisie2.getAttribute( 'type');
            if(attribut == 'text'){
                saisie2.type='password';
                onReset.style.display="flex";
                offReset.style.display="none";
            }
        });
        onResetConf.addEventListener( "click", function() {
            
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'password'){
                saisie.type='text';
                onResetConf.style.display="none";
                offResetConf.style.display="flex";
            }
        });

        offResetConf.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'text'){
                saisie.type='password';
                onResetConf.style.display="flex";
                offResetConf.style.display="none";
            }
        });
    }
    /////////////////////////////////////////////////////////
    if (url.includes('creerUtilisateur')) {
        var saisie=document.getElementById( 'newMDP' );
        var on =document.getElementById( 'monBoutonOn' );
        var off =document.getElementById( 'monBoutonOff' );
        on.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'password'){
                saisie.type='text';
                on.style.display="none";
                off.style.display="flex";
            }
        });

        off.addEventListener( "click", function() {
            var attribut = saisie.getAttribute( 'type');
            if(attribut == 'text'){
                saisie.type='password';
                on.style.display="flex";
                off.style.display="none";
            }
        });
    }

   
