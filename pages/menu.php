<?php
echo '
	<header>
		<div class="ui four item menu">
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'/pages/users.php\';">Пользователи</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="users" onclick="window.location.href = \'/pages/users.php\';">Пользователи</div>
      				<div class="item" data-value="user to groups" onclick="window.location.href = \'/pages/user_to_groups.php\';">Пользователь-группы</div>
      				<div class="item" data-value="groups" onclick="window.location.href = \'/pages/user_groups.php\';">Группы</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'/pages/permissions.php\';">Разрешения</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="permissions" onclick="window.location.href = \'/pages/permissions.php\';">Разрешения</div>
      				<div class="item" data-value="user permissions" onclick="window.location.href = \'/pages/user_permissions.php\';">Разрешения пользователей</div>
      				<div class="item" data-value="user group permissions" onclick="window.location.href = \'/pages/user_group_permissions.php\';">Разрешения групп</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item">
						<div class="ui teal buttons">
  				<div class="ui button" onclick="window.location.href = \'/pages/channels.php\';">Каналы</div>
  				<div name="menu" class="ui floating dropdown icon button">
    				<i class="dropdown icon"></i>
    				<div class="menu">
      				<div class="item" data-value="channels" onclick="window.location.href = \'/pages/channels.php\';">Каналы</div>
      				<div class="item" data-value="disconnecting channels" onclick="window.location.href = \'/pages/disconnecting_channels.php\';">Разрыв каналов</div>
      				<div class="item" data-value="max load channels" onclick="window.location.href = \'/pages/max_load_channels.php\';">Максимальная загрузка каналов</div>
    			</div>
  				</div>
				</div>
				</div>
				
				<div class="item" onclick="window.location.href = \'../index.php\';">
						<button class="ui red basic button">Выход</button>
				</div>
		</div>
	</header>
';