CREATE TABLE `USUARIOS` (
  `U_id` varchar(36) NOT NULL,
  `U_nome` varchar(255) NOT NULL,
  `U_email` varchar(255) NOT NULL,
  `U_telefone` varchar(30) NOT NULL,
  `U_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for table `PLAYERS`
--
ALTER TABLE `USUARIOS`
  ADD PRIMARY KEY (`U_id`);
--
-- AUTO_INCREMENT for table `PLAYERS`
--


CREATE TABLE `TEAMS` (
  `team_id` varchar(64) NOT NULL,
  `team_nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `TEAMS`
--
ALTER TABLE `TEAMS`
  ADD PRIMARY KEY (`team_id`);
--
-- AUTO_INCREMENT for table `TEAMS`
--

CREATE TABLE `BILLINGS` (
  `bill_id` varchar(64) NOT NULL,
  `bill_player_id` varchar(64) NOT NULL,
  `bill_reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `BILLINGS`
--
ALTER TABLE `BILLINGS`
  ADD PRIMARY KEY (`bill_id`);
--
-- AUTO_INCREMENT for table `BILLINGS`
--
