window.addEventListener("load", function(){

    // Remove Loader
    var load_screen = document.getElementById("load_screen");
    document.body.removeChild(load_screen);

    var layoutName = 'Vertical Light Menu';

    var settingsObject = {
        admin: 'Cork Admin Template',
        settings: {
            layout: {
                name: layoutName,
                toggle: true,
                darkMode: false,
                boxed: false,
                logo: {
                    darkLogo: '../src/assets/img/logo.svg',
                    lightLogo: '../src/assets/img/logo.svg'
                }
            }
        },
        reset: false
    }

    let corkThemeObject = settingsObject;
    // let corkThemeObject = '';


    if (settingsObject.reset) {
        sessionStorage.clear()
    }

    if (sessionStorage.length === 0) {
        corkThemeObject = settingsObject;
        // console.log('0')
        // let corkThemeObject = settingsObject;
        // console.log(corkThemeObject)
        // return corkThemeObject;

    } else {
        // console.log('no 0')
        
        let getcorkThemeObject = sessionStorage.getItem("theme");
        let getParseObject = JSON.parse(getcorkThemeObject)
        let ParsedObject = getParseObject;

        if (getcorkThemeObject !== null) {
            // console.log('yes')
               
            if (ParsedObject.admin === 'Cork Admin Template') {

                if (ParsedObject.settings.layout.name === layoutName) {

                     corkThemeObject = ParsedObject;
                } else {
                     corkThemeObject = settingsObject;
                }
                
            } else {
                if (ParsedObject.admin === undefined) {
                     corkThemeObject = settingsObject;
                }
            }

        }  else {
            // console.log('no')
             corkThemeObject = settingsObject;
        }
    }

    // Get Dark Mode Information i.e darkMode: true or false
    
    if (corkThemeObject.settings.layout.darkMode) {
        sessionStorage.setItem("theme", JSON.stringify(corkThemeObject));
        let getcorkThemeObject = sessionStorage.getItem("theme");
        let getParseObject = JSON.parse(getcorkThemeObject)
    
        if (getParseObject.settings.layout.darkMode) {
            let ifStarterKit = document.body.getAttribute('page') === 'starter-pack' ? true : false;
            document.body.classList.add('dark');
            if (ifStarterKit) {
                if (document.querySelector('.navbar-logo')) {
                    // document.querySelector('.navbar-logo').setAttribute('src', '../../src/assets/img/logo.svg')
                }
            } else {
                if (document.querySelector('.navbar-logo')) {
                    // document.querySelector('.navbar-logo').setAttribute('src', getParseObject.settings.layout.logo.darkLogo)
                }
            }
        }
    } else {
        sessionStorage.setItem("theme", JSON.stringify(corkThemeObject));
        let getcorkThemeObject = sessionStorage.getItem("theme");
        let getParseObject = JSON.parse(getcorkThemeObject)

        if (!getParseObject.settings.layout.darkMode) {
            let ifStarterKit = document.body.getAttribute('page') === 'starter-pack' ? true : false;
            document.body.classList.remove('dark');
            if (ifStarterKit) {
                if (document.querySelector('.navbar-logo')) {
                    // document.querySelector('.navbar-logo').setAttribute('src', '../../src/assets/img/logo2.svg')
                }
            } else {
                if (document.querySelector('.navbar-logo')) {
                    // document.querySelector('.navbar-logo').setAttribute('src', getParseObject.settings.layout.logo.lightLogo)
                }
            }
            
        }
    }

    // Get Layout Information i.e boxed: true or false

    if (corkThemeObject.settings.layout.boxed) {
    
        sessionStorage.setItem("theme", JSON.stringify(corkThemeObject));
        let getcorkThemeObject = sessionStorage.getItem("theme");
        let getParseObject = JSON.parse(getcorkThemeObject)
    
        if (getParseObject.settings.layout.boxed) {
            
            if (document.body.getAttribute('layout') !== 'full-width') {
                document.body.classList.add('layout-boxed');
                if (document.querySelector('.header-container')) {
                    // document.querySelector('.header-container').classList.add('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.add('container-xxl');
                }
            } else {
                document.body.classList.remove('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.remove('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.remove('container-xxl');
                }
            }
            
        }
        
    } else {
        
        sessionStorage.setItem("theme", JSON.stringify(corkThemeObject));
        let getcorkThemeObject = sessionStorage.getItem("theme");
        let getParseObject = JSON.parse(getcorkThemeObject)
        
        if (!getParseObject.settings.layout.boxed) {

            if (document.body.getAttribute('layout') !== 'boxed') {
                document.body.classList.remove('layout-boxed');
                if (document.querySelector('.header-container')) {
                    document.querySelector('.header-container').classList.remove('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.remove('container-xxl');
                }
            } else {
                document.body.classList.add('layout-boxed');
                if (document.querySelector('.header-container')) {
                    // document.querySelector('.header-container').classList.add('container-xxl');
                }
                if (document.querySelector('.middle-content')) {
                    document.querySelector('.middle-content').classList.add('container-xxl');
                }
            }
        }
    }

    


    
});

