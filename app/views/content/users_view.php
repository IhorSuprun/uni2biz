<?php if ($this->all_users): ?>
    <?php foreach ($this->all_users as $user): ?>
        <?php if ($user['published']): ?>            
            <div class="">
                <div class="list-group">
                    <div class="list-group-item">
                        <h4><?= $user['firstname'] ?> <?= $user['lastname'] ?></h4>
                        <span class='details'  style="cursor:pointer" onclick="showDetails('<?= $user['id'] ?>')">
                            <a onclick='this.innerHTML == "View details" ? this.innerHTML = "Hide details" : this.innerHTML = "View details"'>View details</a>
                        </span>                           
                        <div id="details<?= $user['id'] ?>" style="display: none">  
                            <div class="mycontact">
                                <!--                                Adress-->
                                <div>
                                    <h5>Adress</h5>
                                    <p><?= $user['adress'] ?></p>
                                    <p><?= $user['zipcode'] ?></p>
                                    <?php foreach ($this->countries as $user_country): ?>
                                        <?php if ($user_country['id'] === $user['country_id']): ?> 
                                            <p><?= $user_country['name'] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <!--                                Phones-->
                                <div>
                                    <h5>Phones</h5>
                                    <?php foreach ($this->all_phones as $user_phone): ?>
                                        <?php if (($user_phone['user_id'] === $user['id']) && ($user_phone['published'] == 1)): ?> 
                                            <p><?= $user_phone['phone'] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                                <!--                                Emails-->
                                <div>
                                    <h5>Emails</h5>
                                    <?php foreach ($this->all_emails as $user_email): ?>
                                        <?php if (($user_email['user_id'] === $user['id']) && ($user_email['published'] == 1)): ?> 
                                            <p><?= $user_email['email'] ?></p>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
<?php endif; ?>