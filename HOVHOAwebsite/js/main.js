const button = document.getElementById('seeMore');
        const hiddenRows = document.querySelectorAll('.hidden-row');

        let expanded = false;

        button.addEventListener('click', function() {

            if (!expanded) {
                hiddenRows.forEach(row => {
                    row.style.display = 'table-row';
                });

                button.textContent = 'See Less';
                expanded = true;

            } else {
                hiddenRows.forEach(row => {
                    row.style.display = 'none';
                });

                button.textContent = 'See More';
                expanded = false;
            }

        });