var models = require('./server/models/')
models.sequelize
  .authenticate().then(() => {
    return models.Student.create({
      region: 0,
      form: 2,
      mark1: 1,
      mark2: 3,
      mark3: 5,
      mark_mean: 3
    })
  }).then(() => {
    return models.sequelize.close()
  })
  .catch(function (error) {
    return console.log('Error creating connection:', error)
  })
