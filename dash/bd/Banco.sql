
CREATE TABLE `DIRECTOR` (
  `director_id` varchar(64) NOT NULL,
  `director_nome` varchar(255) NOT NULL,
  `director_email` varchar(255) NOT NULL,
  `director_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `DIRECTOR`
--
ALTER TABLE `DIRECTOR`
  ADD PRIMARY KEY (`director_id`,`director_email`);
--
-- AUTO_INCREMENT for table `DIRECTOR`
--

CREATE TABLE `COUCHS` (
  `couch_id` varchar(64) NOT NULL,
  `couch_nome` varchar(255) NOT NULL,
  `couch_email` varchar(255) NOT NULL,
  `couch_team` varchar(255) NOT NULL,
  `couch_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `COUCHS`
--
ALTER TABLE `COUCHS`
  ADD PRIMARY KEY (`couch_id`,`couch_email`);
--
-- AUTO_INCREMENT for table `COUCHS`
--

CREATE TABLE `PLAYERS` (
  `player_id` varchar(64) NOT NULL,
  `player_nome` varchar(255) NOT NULL,
  `player_email` varchar(255) NOT NULL,
  `player_team` varchar(255) NOT NULL,
  `player_senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `PLAYERS`
--
ALTER TABLE `PLAYERS`
  ADD PRIMARY KEY (`player_id`,`player_email`);
--
-- AUTO_INCREMENT for table `PLAYERS`
--


CREATE TABLE `TEAMS` (
  `team_id` varchar(64) NOT NULL,
  `team_nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `PLAYERS`
--
ALTER TABLE `PLAYERS`
  ADD PRIMARY KEY (`team_id`);
--
-- AUTO_INCREMENT for table `PLAYERS`
--

CREATE TABLE `BILLINGS` (
  `bill_id` varchar(64) NOT NULL,
  `bill_player_id` varchar(64) NOT NULL,
  `bill_reference` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Indexes for table `PLAYERS`
--
ALTER TABLE `PLAYERS`
  ADD PRIMARY KEY (`bill_id`);
--
-- AUTO_INCREMENT for table `PLAYERS`
--
