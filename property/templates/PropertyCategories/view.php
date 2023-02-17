

<div class="container-fluid px-2 px-md-4">
  <div class="page-header min-height-300 border-radius-xl mt-4" style="background-image: url('https://images.unsplash.com/photo-1531512073830-ba890ca4eba2?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1920&q=80');">
    <span class="mask  bg-gradient-primary  opacity-6"></span>
  </div>
  <div class="card card-body mx-3 mx-md-4 mt-n6">
    <div class="row gx-4 mb-2">
      <div class="col-auto">
        <div class="row">
          <div class="column-responsive column-80">
            <div class="users view content">
              <?= $this->Html->image(($user['user_profile']->image), array('width' => '300px')) ?>
              <h3><?= h($user->id) ?></h3>
              <table>
                <tr>
                  <th><?= __('Image') ?></th>
                  <td><?= $this->Html->image(($user['user_profile']->image), array('width' => '80px')) ?></td>
                </tr>
                <tr>
                  <th><?= __('Email') ?></th>
                  <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                  <th><?= __('First Name') ?></th>
                  <td><?= h($user['user_profile']->first_name) ?></td>
                </tr>
                <tr>
                  <th><?= __('Last Name') ?></th>
                  <td><?= h($user['user_profile']->last_name) ?></td>
                </tr>
                <tr>
                  <th><?= __('Phone Number') ?></th>
                  <td><?= h($user['user_profile']->contact_number) ?></td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>