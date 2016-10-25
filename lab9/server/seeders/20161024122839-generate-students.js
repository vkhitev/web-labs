'use strict'

const fsp = require('fs-promise')
const path = require('path')

const rand = require('../util/random-data')

const tmpDir = 'C:/ProgramData/MySQL/MySQL Server 5.5/Uploads/'
const tmpFile = path.join(tmpDir, 'tmp.txt')

const loadDataQuery = `
LOAD DATA INFILE :file INTO TABLE student
	FIELDS TERMINATED BY ' '
    LINES TERMINATED BY '\n'
    (@col1, @col2, @col3, @col4, @col5)
    SET region=@col1,
    		form=@col2,
        mark1=@col3,
        mark2=@col4,
        mark3=@col5
`

module.exports = {
  up: function (queryInterface, Sequelize) {
    return Promise.resolve().then(() => {
      const data = rand.getRandomStudents(5).map((student) => {
        const { region, form, mark1, mark2, mark3 } = student
        return `${region} ${form} ${mark1} ${mark2} ${mark3}`
      }).join('\n')
      return fsp.writeFile(tmpFile, data)
    }).then(() => {
      return queryInterface.sequelize.query(loadDataQuery, { replacements: { file: tmpFile } })
    }).then(() => {
      return fsp.unlink(tmpFile)
    })
  },

  down: function (queryInterface, Sequelize) {
    return queryInterface.bulkDelete('Student', null, {})
  }
}
