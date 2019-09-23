<article>
    <div class="block-settings">
        <header class="header-table">
            <img class="settings_icon"
                 src="public/img/settings.svg"
                 alt="Settings">
            <h2>Settings</h2>
        </header>
        <form method="POST" class="add-city-form" action="settings">
            <fieldset>
                <div class="aligned-table">
                    <input id="city" type="text" placeholder="New city" name="newCity">
                    <button class="button-primary button-add" type="submit">
                        <span>Ajouter</span>
                        <img class="icon_button-primary"
                             src="public/img/add.svg"
                             alt="Back">
                    </button>
                </div>
            </fieldset>
        </form>
        <div>
            <?php
            foreach ($templateParam as $cities) {
                foreach($cities as $city){
                    ?>
                    <div class="aligned-table">
                        <p><?= $city->getCity(); ?></p>
                        <div>
                            <form method="POST" class="delete-city-form" action="settings">
                                <input id="<?= $city->getCity(); ?>" type="hidden" name="deleteCity" value="<?= $city->getCity(); ?>"/>
                                <button type="submit" class="button-delete">
                                    <img class="settings_icon"
                                       src="public/img/close.svg"
                                       alt="Settings">
                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                    }
                }
                ?>
        </div>
    </div>
    <div class="big-space"></div>
    <a href="home">
        <button class="button-secondary" type="button">
            <img class="icon_button-secondary"
                 src="public/img/arrow-left.svg"
                 alt="Back">
            <span>Retour</span>
        </button>
    </a>
</article>