@include("components._header-admin")
@include("components._menu-profile-admin")
@include("components._side-bar-admin")
<div class="content">
    <div class="widgets">
        <div class="calonpesdik">
            <img src="{{ asset("icons/personbox.svg") }}" alt="icon person">
            <h3>Calon Peserta Didik</h3>
            <h1>{{ $candidates  }}</p>
            <h2>Jumlah</h2>
        </div>
        <div class="pesdik">
            <img src="{{ asset("icons/personbox.svg") }}" alt="icon person">
            <h3>Peserta Didik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>

        </div>
        <div class="guru">
            <img src="{{ asset("icons/personbox.svg")  }}" alt="icon person">
            <h3>Pendidik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>

        </div>
        <div class="nonguru">
            <img src="{{ asset("icons/personbox.svg")  }}" alt="icon person">
            <h3>Non Kependidik</h3>
            <h1>0</h1>
            <h2>Jumlah</h2>
        </div>
    </div>

    <div class="calendar">
        <p>Calendar</p>
        <hr>
        <div class="header-calendar">
        <p class="current-date"></p>
        <div class="icons-calendar">
        <span><img src="{{ asset("icons/chevron_left.svg")  }}" alt="icon arrow left"></span>
        <span><img src="{{ asset("icons/chevron_right.svg")  }}" alt="icon arrow right"></span>
        </div>
        </div>
        <div class="calendar-items">
            <div class="weeks">
                <label>Sun</label><label>Mon</label>
                <label>Tue</label><label>Wed</label>
                <label>Thu</label><label>Fri</label>
                <label>Sat</label>
            </div>
            <div class="days">
                <label class="inactive-days">28</label><label class="inactive-days">29</label><label class="inactive-days">30</label><label>1</label><label>2</label><label>3</label><label>4</label><label>5</label><label>6</label><label class="active-days">7</label><label>8</label><label>9</label><label>10</label>
                <label>11</label><label>12</label><label>13</label><label>14</label><label>15</label><label>16</label><label>17</label><label>18</label><label>19</label><label>20</label>
                <label>21</label><label>22</label><label>23</label><label>24</label><label>25</label><label>26</label><label>27</label><label>28</label><label>29</label><label>30</label><label>31</label><label class="inactive-days">1</label>
            </div>
        </div>
    </div>

    <div class="something">

    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const currentDate = document.querySelector(".current-date");

    let date = new Date();
    let currYear = date.getFullYear();
    let currMonth = date.getMonth();

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const renderCalendar = () => {
        currentDate.innerText = `${months[currMonth]} ${currYear}`;
    };

    renderCalendar();

    // optional: debug biar tau apa yang keluar
    console.log("Month index:", currMonth);
    console.log("Displayed:", `${months[currMonth]} ${currYear}`);
});
</script>
@include("components._footer-admin")