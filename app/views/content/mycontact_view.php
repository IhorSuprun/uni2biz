<form action="/users/update" method="post">
    <div class='my'>
        <div class="mycontact">
            <!--            Contact-->
            <div class="contact">
                <h4>CONTACT</h4>
                <div class="form-group">
                    <label class="w-100">
                        <span>Firstname *</span>
                        <input type="text" name="firstname" value="<?= $this->user['firstname'] ?>" required class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">
                        <span>Lastname *</span>
                        <input type="text" name="lastname" value="<?= $this->user['lastname'] ?>" required class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">
                        <span>Adress *</span>
                        <input type="text" name="adress" value="<?= $this->user['adress'] ?>" required class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">
                        <span>ZIP City *</span>
                        <input type="text" name="zipcode" value="<?= $this->user['zipcode'] ?>" required class="form-control">
                    </label>
                </div>
                <div class="form-group">
                    <label class="w-100">
                        <span>Country *</span>
                        <select name="country_id">
                            <?php foreach ($this->countries as $country): ?>
                                <?php if ($this->user['country_id'] == $country['id']): ?>
                                    <option selected value="<?= $country['id'] ?>"><?= $country['name'] ?></option>;
                                <?php else: ?>
                                    <option value="<?= $country['id'] ?>"><?= $country['name'] ?></option>;
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </label>
                </div>
            </div>
            <!--Phone numbers-->
            <div class="phones" id="phones_list">
                <h4>PHONE NUMBERS</h4>
                <?php foreach ($this->phones as $phone): ?>
                    <div class="form-group" >
                        <label class="w-100">
                            <label>
                                <?php if ($phone['published']): ?>  
                                    <input type="checkbox" checked name="pub_phone_<?= $phone['id'] ?>">
                                <?php else: ?>  
                                    <input type="checkbox" name="pub_phone_<?= $phone['id'] ?>">
                                <?php endif; ?>
                                Published</label>
                            <input type="text" name="phone_<?= $phone['id'] ?>" value="<?= $phone['phone'] ?>" class="form-control">  
                        </label>
                    </div>
                <?php endforeach; ?>     
                <span style="cursor:pointer;" onclick="addField('phone')" id="add_new_phone">+Add new</span>
            </div>
            <!--            Emails-->
            <div class="emails">
                <h4>EMAILS</h4>
                <?php foreach ($this->emails as $email): ?>
                    <div class="form-group">
                        <label class="w-100">
                            <label>
                                <?php if ($email['published']): ?>  
                                    <input type="checkbox" checked name="pub_email_<?= $email['id'] ?>">
                                <?php else: ?>  
                                    <input type="checkbox" name="pub_email_<?= $email['id'] ?>">
                                <?php endif; ?>
                                Published</label>
                            <input type="text" name="email_<?= $email['id'] ?>" value="<?= $email['email'] ?>" class="form-control">
                        </label>
                    </div>
                <?php endforeach; ?>
                <span style="cursor:pointer" onclick="addField('email')" id="add_new_email">+Add new</span>
            </div>
        </div>
        <div class="mycontact">
            <div class="form-group">
                <span style="color: grey">* Fields are mandatory</span>
            </div>
            <label>
                <?php if ($this->user['published']): ?>
                    <input type="checkbox" checked name="published">
                <?php else: ?>  
                    <input type="checkbox" name="published">
                <?php endif; ?>
                Publish my contact</label>
            <div class="form-group">
                <input type="hidden" name="id" value="<?= $this->user['id'] ?>">
                <input type="submit" name="send" value="Save" class="btn btn-success">
            </div>
        </div>
    </div>
</form>
