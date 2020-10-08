var eltSelect1 = document.querySelector('#recurrence-1');
var eltSelect2 = document.querySelector('#recurrence-2');
var eltStartEnd = document.querySelector('#recurrence-start-end');
var eltDate = document.querySelector('#recurrence-date');

eltSelect1.addEventListener('change', function () {
    if (this.selectedIndex == 0)
    {
        eltStartEnd.style.display = 'none';
        eltDate.style.display = 'block';
    }
    else
    {
        eltStartEnd.style.display = 'block';
        eltDate.style.display = 'none';
    }

    eltSelect2.selectedIndex = this.selectedIndex;
})

eltSelect2.addEventListener('change', function () {
    if (this.selectedIndex == 0)
    {
        eltStartEnd.style.display = 'none';
        eltDate.style.display = 'block';
    }
    else
    {
        eltStartEnd.style.display = 'block';
        eltDate.style.display = 'none';
    }

    eltSelect1.selectedIndex = this.selectedIndex;
})
