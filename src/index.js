require('./style.css')
{
    const $menuBtns = document.querySelectorAll(`.menu-toggle`),
    $menu = document.querySelector(`.menu`),
    $programmaHeader = document.querySelector(`.header-programma`),
    $detailHeader = document.querySelector(`.header-detail`),
    //$filterForm = document.querySelector(`.filterForm`),
    $dropDownFilter = document.querySelector(`.dropdown`),
    $extraFilters = document.querySelector(`.extraFilters`);

    const init = () => {
        $menuBtns.forEach(menuBtn =>{
            menuBtn.addEventListener(`submit`, handleSubmitMenu);
        })

        /*if ($filterForm) {
            $filterForm.addEventListener(`submit`, handleSubmitFilterForm);
        }*/

        if ($dropDownFilter) {
        $dropDownFilter.addEventListener(`click`, handleClickDropdown);
        }

    };

    const handleClickDropdown = e =>{
        e.preventDefault();
        console.log( $extraFilters.getAttribute('style'));
        if($extraFilters.getAttribute('style') == 'display:block;'){
            $extraFilters.setAttribute('style','display:none;');
            $dropDownFilter.setAttribute('style','border-bottom: solid var(--primary-color) 0.2rem;')
        }else if($extraFilters.getAttribute('style') == 'display:none;'){
            $extraFilters.setAttribute('style','display:block;');
            $dropDownFilter.setAttribute('style','border-bottom: none;')

        }
        
        



    }

    const handleSubmitMenu = e => {
        e.preventDefault();
        
        if(e.target.querySelector('input[type="submit"]').classList.value == 'close'){
            $menu.classList.add('inactive-menu');
            if ($programmaHeader !== 'undefined' && $programmaHeader !== null) {
                $programmaHeader.classList.remove('header-active');
            }
            if ($detailHeader !== 'undefined' && $detailHeader !== null) {
                $detailHeader.classList.remove('header-active');
            }
        }else{
            $menu.classList.remove('inactive-menu')
            if ($programmaHeader !== 'undefined' && $programmaHeader !== null) {
                $programmaHeader.classList.add('header-active');
            }
            if ($detailHeader !== 'undefined' && $detailHeader !== null) {
                $detailHeader.classList.add('header-active');
            }

        }
        

      };

      /*const handleSubmitFilterForm = e => {
        e.preventDefault();
        
    
        const qs = new URLSearchParams([
          ...new FormData($filterForm).entries()
        ]).toString();
    
        const $url = `index.php?${qs}`;

        fetch($url, {
          headers: new Headers({
            Accept: `application/json`
          }),
          method: 'get'
        })
          .then(r => r.json())
          .then(data => handleLoadActs(data));
      };

      const handleLoadActs = data => {

        console.log(data);
        
        $acts.innerHTML = '';
    
        if (data.length > 0) {
          data.forEach(act => {
            createActsPreviews(act);
          });
        } else {
          noResult();
        }
      };*/

      
      init();

      
}

