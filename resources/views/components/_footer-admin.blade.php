<script defer>
    function handleSidebar() {
        const checkbox = document.getElementById('check');
        const checkbox2 = document.getElementById('check2');
        const float = document.querySelector('.floating');
        const sidebar = document.querySelector('.sidebar');
        const isMobile = window.innerWidth < 768;

        if (!isMobile) {
            sidebar.style.display = 'flex';
            checkbox2.style.display = 'none';
            checkbox.checked = false;
            checkbox2.checked = false;
        } else {
            checkbox2.style.display = 'flex';
            sidebar.style.display = checkbox.checked ? 'flex' : 'none';
        }

        if (checkbox2.checked) {
            sidebar.style.display = 'none';
            float.style.display = "flex";
            checkbox.checked = false;
        }
    }

    handleSidebar();

    document.getElementById('check').addEventListener('change', handleSidebar);
    document.getElementById('check2').addEventListener('change', handleSidebar);

    window.addEventListener('resize', handleSidebar);

    let btn_nav = document.querySelector('.options-s').parentElement.parentElement.children;
    btn_nav = Array.from(btn_nav).filter((element) => element.tagName === "A" )
    const prefixPage = "/smk_tin/admin"
    const currentPath = location.pathname; 
    btn_nav.forEach(element => {
        const optionbtn = element.children[0];
        if(currentPath === `${prefixPage}/dashboard`){
            setAllIntoNotSelected(optionbtn, "dashboard");
        }else if(currentPath === `${prefixPage}/candidates`){
            setAllIntoNotSelected(optionbtn, "candidates");
        }
    });

    function setAllIntoNotSelected(optionbtn, name){
        optionbtn.classList = ["options-s"];
        if(optionbtn.id == name){
            optionbtn.classList = ["options"];
        }
    }

</script>

</body>

</html>